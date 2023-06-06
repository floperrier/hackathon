<?php

namespace App\Enums;

use App\Enums\EnumHelper;

enum DevLangagesEnum: string
{
    use EnumHelper;

    case AGDA = 'agda';
    case BF = 'bf';
    case C = 'c';
    case C_SHARP = 'csharp';
    case CFML = 'cfml';
    case CLOJURE = 'clojure';
    case COBOL = 'cobol';
    case COFFEESCRIPT = 'coffeescript';
    case COMMON_LISP = 'commonlisp';
    case COQ = 'coq';
    case CPP = 'cpp';
    case CRYSTAL = 'crystal';
    case DART = 'dart';
    case ELIXIR = 'elixir';
    case ELM = 'elm';
    case ERLANG = 'erlang';
    case F_SHARP = 'fsharp';
    case FACTOR = 'factor';
    case FORTH = 'forth';
    case FORTRAN = 'fortran';
    case GO = 'go';
    case GROOVY = 'groovy';
    case HASKELL = 'haskell';
    case HAXE = 'haxe';
    case IDRIS = 'idris';
    case JAVA = 'java';
    case JAVASCRIPT = 'javascript';
    case JULIA = 'julia';
    case KOTLIN = 'kotlin';
    case LEAN = 'lean';
    case LUA = 'lua';
    case NASM = 'nasm';
    case NIM = 'nim';
    case OBJECTIVE_C = 'objectivec';
    case OCAML = 'ocaml';
    case PASCAL = 'pascal';
    case PERL = 'perl';
    case PHP = 'php';
    case POWERSHELL = 'powershell';
    case PROLOG = 'prolog';
    case PURESCRIPT = 'purescript';
    case PYTHON = 'python';
    case R = 'r';
    case RACKET = 'racket';
    case RAKU = 'raku';
    case REASON = 'reason';
    case RUBY = 'ruby';
    case RUST = 'rust';
    case SCALA = 'scala';
    case SHELL = 'shell';
    case SOLIDITY = 'solidity';
    case SQL = 'sql';
    case SWIFT = 'swift';
    case TYPESCRIPT = 'typescript';
    case VB = 'vb';
}
