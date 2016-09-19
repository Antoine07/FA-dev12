
let sqr_succ_one x = 
	let next x = x +1  in (next x)*(next x) ;;

let sqr_succ x = (x+1)*(x+1);;

(* exemple de variable locale *)
let f x = 
	let y = 5 in x*y;;	

(* si tu appelles y dans le contexte globale cette variable n'existe pas *)

(* Ocaml et les fonctions anomymes sans nom *)
(function x->x*x) 5;;

(* fonction valeur absolue *)
let abs x = if x < 0  then -x else x;;