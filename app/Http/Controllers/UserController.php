<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $userClient = $user->client;
        $similarProfil = $this->similarProfil($id) ;

        // dd($similarProfil);

        return view('user-profile', [
            'datas' => $user,
            'clientDatas' => $userClient,
            'similarProfils' => $similarProfil,
        ]);
    }

    /**
     * Return user similar profil base on this languages.
     *
     * @param  Collection  $myLanguages
     * @return Response
     */
    private function similarProfil($utilisateurId){

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
