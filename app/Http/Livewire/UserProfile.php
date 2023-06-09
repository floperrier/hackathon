<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;
    public $userClient;
    public $similarProfil;
    public $userStatus;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->userClient = $this->user->client;
        $this->similarProfil = $this->getSimilarProfil($id);
        $this->userStatus = $this->user->available;
    }

    public function updatedUserStatus(){
        if($this->userStatus != $this->user->available) {
            DB::table('users')
              ->where('id', $this->user->id)
              ->update(['available' => $this->userStatus]);
            // dd(['status'=>$this->userStatus, 'this->user->available'=>$this->user->available]);
        }
    }

    public function render()
    {
        return view('livewire.user-profile', [
            'datas' => $this->user,
            'clientDatas' => $this->userClient,
            'similarProfils' => $this->getSimilarProfil($this->user->id)
        ]);
    }

    /**
     * Return user similar profil base on this languages.
     *
     * @param  Collection  $myLanguages
     * @return Response
     */
    private function getSimilarProfil($utilisateurId){

        $utilisateur = User::find($utilisateurId);
        $utilisateursSimilaires = [];

        foreach (User::where('id', '!=', $utilisateurId)->get() as $autreUtilisateur) {
            if ($autreUtilisateur !== $utilisateur) {
                $pourcentage = $this->calculerPourcentageCorrespondance($this->userLanguagesNameList($utilisateur->languagesRanks), $this->userLanguagesNameList($autreUtilisateur->languagesRanks));
                if ($pourcentage >= 50) {
                    $utilisateursSimilaires[] = $autreUtilisateur;
                }
            }
        }

        return $utilisateursSimilaires;
    }

    private function calculerPourcentageCorrespondance($listeCompUtilisateur, $listeCompAutreUtilisateur) {
        $nbCommunes = count(array_intersect($listeCompUtilisateur, $listeCompAutreUtilisateur));
        $pourcentageCorrespondance = 0;
        if(count($listeCompAutreUtilisateur) > 0){
            $pourcentageCorrespondance = ($nbCommunes / count($listeCompUtilisateur)) * 100;
        }
        return $pourcentageCorrespondance;
    }

    private function userLanguagesNameList($languages){
        $languagesNameList = [];
        foreach($languages as $language) {
            $languagesNameList[] = $language->language_name;
        }
        return $languagesNameList;
    }
}
