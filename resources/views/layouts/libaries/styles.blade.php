<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
.status-container {
position: relative;

}

.status {
    padding: 5px 10px;
    border-radius: 4px;
    color: #fff;
}
.approved {
    background-color: green;
}

.pending {
    background-color: orange;
}

.rejected {
    background-color: red;
}

.delivered {
    background-color: blue;
}

.duplicated {
    background-color: gray;
}

.status-select {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
}

.select-style {
  position: relative;
  display: inline-block;
}

.select-style select {
  padding: 5px;
  width: 100px; 
  border: radi;
  border-radius: 5px;
  background: #f2f2f2;
  color: #555;
  appearance: none;
}

.select-style select:focus {
  outline: none;
  background: #e8e8e8;
}

.small-box {
    border-radius: 10px;
    overflow: hidden;
    width: 300px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}
.small-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
}
.small-box .inner {
    padding: 20px;
}
.small-box .inner h3 {
    margin: 0;
    font-size: 28px;
}
.small-box .inner p {
    margin: 10px 0;
    font-size: 16px;
}
.small-box .icon {
    background-color: #F4F6F9;
    display: flex;
    justify-content: center;
    align-items: center;
}
.small-box .icon i {
    font-size: 40px;
    color: #B5F2E5;
}
.small-box .small-box-footer {
    display: block;
    padding: 10px;
    text-align: center;
    background-color: #F4F6F9;
    color: #333;
    text-decoration: none;
    transition: all 0.3s ease;
}
.small-box .small-box-footer:hover {
    background-color: #E3E6E9;
}


/* <!-- Left navbar links --> */

.burger {
  position: relative;
  width: 30px;
  height: 20px;
  background: transparent;
  cursor: pointer;
  display: block;
  margin-left:68px;
  margin-bottom: -15px;
  color: white;
}

.burger input {
  display: none;
}

.burger span {
  display: block;
  position: absolute;
  height: 3px;
  width: 100%;
  background: black;
  border-radius: 9px;
  opacity: 1;
  left: 0;
  transform: rotate(0deg);
  transition: .25s ease-in-out;
}

.burger span:nth-of-type(1) {
  top: 0px;
  transform-origin: left center;
}

.burger span:nth-of-type(2) {
  top: 50%;
  transform: translateY(-50%);
  transform-origin: left center;
}

.burger span:nth-of-type(3) {
  top: 100%;
  transform-origin: left center;
  transform: translateY(-100%);
}

.burger input:checked ~ span:nth-of-type(1) {
  transform: rotate(60deg);
  top: 0px;
  left: 5px;
}

.burger input:checked ~ span:nth-of-type(2) {
  width: 0%;
  opacity: 0;
}

.burger input:checked ~ span:nth-of-type(3) {
  transform: rotate(-60deg);
  top: 28px;
  left: 5px;

}

/* style de recherche  */
.group {
 display: flex;
 line-height: 28px;
 align-items: center;
 position: relative;
 max-width: 190px;
 margin-bottom: 20px;
    }

 .input {
 width: 100%;
 height: 40px;
 line-height: 28px;
 padding: 0 1rem;
 padding-left: 2.5rem;
 border: 2px solid transparent;
 border-radius: 8px;
 outline: none;
 background-color: #f3f3f4;
 color: #0d0c22;
 transition: 0.3s ease;
}

.input::placeholder {
color: #9e9ea7;
}

.input:focus,
.input:hover {
  outline: none;
  border-color: rgba(234, 226, 183, 0.4);
  background-color: #fff;
  box-shadow: 0 0 0 4px rgb(234 226 183 / 10%);
}

.icon {
  position: absolute;
  left: 1rem;
  fill: #9e9ea7;
  width: 1rem;
  height: 1rem;
  cursor: pointer;
}
/* le style de les image  */

.card {
 border: 1px solid #ccc;
 border-radius: 10px;
 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 margin-top: 20px;
} 

.card-header {
    background-color: #17a2b8;
    color: #fff;
    border-radius: 10px 10px 0 0;
}

.btn-primary,
.btn-danger,
.btn-info {
    border-radius: 5px;
}

.btn-lg {
    font-size: 1.25rem; 
}

#selected-images img,
#selected-logo img,
#selected-image-description img,
#selected-reviews-images img {
max-width: 70px;
margin-right: 10px;
margin-top: 10px;
 }


/*style de liste de template   */
.cards {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
}

.cards .card {
    flex: 0 1 calc(40% - 15px);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    height: 180px;
    border-radius: 10px;
    color: #000;
    cursor: pointer;
    transition: transform 0.4s, box-shadow 0.4s;
    background-color: rgba(65, 65, 65, 0.11);
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(144, 161, 255, 0.171);
    backdrop-filter: blur(30px);
    position: relative;
    overflow: hidden; 
}

.cards .card::before,
.cards .card::after {
    content: "";
    background-color: #7090fa4b;
    position: absolute;
    filter: blur(10px);
    border-radius: 50%;
    width: 7rem;
    height: 7rem;
    top: 20%;
    z-index: 0; 
}

.cards .card a {
    text-decoration: none;
    color: #1A2130;
    font-size: 1.2em;
    font-weight: bold;
    transition: color 0.3s, transform 0.3s;
    z-index: 1; 
    position: relative; 
}

.cards .card a:hover {
    color: #f43f5e;
    transform: scale(1.05);
}

.cards .card p.tip {
    font-size: 1em;
    font-weight: 700;
}

.cards .card p.second-text {
    font-size: 0.7em;
}

.cards .card:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.cards:hover > .card:not(:hover) {
    filter: blur(5px);
    transform: scale(0.9);
}

.clear-button {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
}

.clear-button:hover {
    color: #f43f5e;
}
/* style de l'icon de geo */
.flag-icon {
    width: 20px;
    height: 15px;
    margin-right: 8px;
    vertical-align: middle;
}
/* Ajustement pour Select2 */
.select2-container--default .select2-selection--single {
    height: auto !important; /* Réinitialisation de la hauteur à auto */
    line-height: 38px; /* Ajuster la hauteur de ligne si nécessaire */
    padding: 5px; /* Ajouter un padding pour l'espacement */
    overflow: hidden; /* Masquer tout débordement */
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 38px; /* Ajuster la hauteur de la flèche si nécessaire */
}

.select2-dropdown {
    position: absolute;
    width: 100%;
    margin-top: 2px; /* Ajuster la marge supérieure pour le positionnement */
    background-color: #fff;
    border: 1px solid #ccc;
    z-index: 9999;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    overflow-y: auto; /* Activer le défilement vertical si nécessaire */
    max-height: 200px; /* Définir une hauteur maximale pour la liste déroulante */
}

.select2-results__options {
    max-height: 200px; /* Définir une hauteur maximale pour la liste des options */
    overflow-y: auto; /* Activer le défilement vertical si nécessaire */
}

.select2-results__option {
    padding: 8px 12px; /* Ajuster le padding des options */
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    white-space: nowrap; /* Empêcher le débordement de texte dans la sélection */
    overflow: hidden; /* Masquer tout débordement de texte */
    text-overflow: ellipsis; /* Ajouter des points de suspension pour le texte dépassant */
}

/* button Preview */
/* .cta {
  position: relative;
  padding: 12px 18px;
  transition: all 0.2s ease;
  border: none;
  background: none;
  cursor: pointer;
  margin-left: 550px; 
}

.cta:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  border-radius: 50px;
  background: #b1dae7;
  width: 45px;
  height: 45px;
  transition: all 0.3s ease;
}

.cta span {
  position: relative;
  font-family: "Ubuntu", sans-serif;
  font-size: 18px;
  font-weight: 700;
  letter-spacing: 0.05em;
  color: #234567;
}

.cta svg {
  position: relative;
  top: 0;
  margin-left: 10px;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke: #234567;
  stroke-width: 2;
  transform: translateX(-5px);
  transition: all 0.3s ease;
}

.cta:hover:before {
  width: 100%;
  background: #b1dae7;
}

.cta:hover svg {
  transform: translateX(0);
}

.cta:active {
  transform: scale(0.95);
} */

</style>
@stack('css')