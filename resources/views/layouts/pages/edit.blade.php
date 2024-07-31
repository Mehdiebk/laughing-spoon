@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center; font-size: 24px;">Modifier Produit</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('produit.update', $produit->id) }}">
                            @csrf
                            @method("PATCH")
                            
                            <div class="form-group row">
                                <label for="nom_produit" class="col-md-2 col-form-label text-md-right">PRODUIT :</label>
                                <div class="col-md-4">
                                    <input id="nom_produit" type="text" class="form-control" name="nom_produit" value="{{ $produit->nom_produit }}">
                                </div>  
                            </div>  
                            <div class="form-group row">
                            <label for="mini_description" class="col-md-2 col-form-label text-md-right">MINI_DESCRIPTION :</label>
                                <div class="col-md-4">
                                    <textarea id="mini_description" class="form-control" name="mini_description" >{{ $produit->mini_description }}</textarea>
                                </div>
                                <label for="description" class="col-md-2 col-form-label text-md-right">DESCRIPTION :</label>
                                <div class="col-md-4">
                                    <textarea id="description" class="form-control" name="description" >{{ $produit->description }}</textarea>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label for="prix" class="col-md-2 col-form-label text-md-right">PRIX :</label>
                                <div class="col-md-4">
                                    <input id="prix" type="text" class="form-control" name="prix"  value="{{ $produit->prix }}">
                                </div>

                                <label for="nouveau_prix" class="col-md-2 col-form-label text-md-right">NOUVEAU PRIX :</label>
                                <div class="col-md-4">
                                    <input id="nouveau_prix" type="text" class="form-control" name="nouveau_prix"  value="{{ $produit->nouveau_prix }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="geo" class="col-md-2 col-form-label text-md-right">GEO :</label>
                                <div class="col-md-4">
                                    <select id="geo" class="form-control" name="geo">
                                        <option value="{{ $produit->geo }}" selected>{{ $produit->geo }}</option>
                                    </select>
                                </div>

                                <label for="devise" class="col-md-2 col-form-label text-md-right">DEVISE :</label>
                                <div class="col-md-4">
                                    <input id="devise" type="text" class="form-control" name="devise" value="{{ $produit->devise }}" readonly>
                                    <img class="flag-icon" data-country="{{ $produit->geo }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alias" class="col-md-2 col-form-label text-md-right">Alias :</label>
                                <div class="col-md-4">
                                    <input id="alias" type="text" class="form-control" name="alias" placeholder="GEO-PRODUCTNAME"  value="{{ $produit->alias }}">
                                </div>

                                <label for="stock_restant" class="col-md-2 col-form-label text-md-right">Stock Restant :</label>
                                <div class="col-md-4">
                                    <input id="stock_restant" type="text" class="form-control" name="stock_restant"  value="{{ $produit->stock_restant }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="livraison_promo" class="col-md-2 col-form-label text-md-right">Livraison Promo :</label>
                                <div class="col-md-4">
                                    <input id="livraison_promo" type="text" class="form-control" name="livraison_promo"  value="{{ $produit->livraison_promo }}">
                                </div>

                                <label for="notation" class="col-md-2 col-form-label text-md-right">Notation :</label>
                                <div class="col-md-4">
                                    <input id="notation" type="text" class="form-control" name="notation"  value="{{ $produit->notation }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="livraison_gratuite" class="col-md-2 col-form-label text-md-right">Livraison gratuite :</label>
                                <div class="col-md-4">
                                    <input id="livraison_gratuite" type="text" class="form-control" name="livraison_gratuite" value="{{ $produit->livraison_gratuite }}">
                                </div>

                                <label for="offer" class="col-md-2 col-form-label text-md-right">Offre limitée exclusive :</label>
                                <div class="col-md-4">
                                    <input id="offer" type="text" class="form-control" name="offer" value="{{ $produit->offer }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paiement" class="col-md-2 col-form-label text-md-right">Paiement sécurisé :</label>
                                <div class="col-md-4">
                                    <input id="paiement" type="text" class="form-control" name="paiement" value="{{ $produit->paiement }}">
                                </div>
                                <label for="avis_clients" class="col-md-2 col-form-label text-md-right">Avis de nos clients :</label>
                                <div class="col-md-4">
                                    <input id="avis_clients" type="text" class="form-control" name="avis_clients" value="{{ $produit->avis_clients }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="about" class="col-md-2 col-form-label text-md-right">About :</label>
                                <div class="col-md-4">
                                    <input id="about" type="text" class="form-control" name="about" value="{{ $produit->about}}">
                                </div>

                                <label for="more_about" class="col-md-2 col-form-label text-md-right">More about :</label>
                                <div class="col-md-4">
                                    <input id="more_about" type="text" class="form-control" name="more_about" value="{{ $produit->more_about}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=" ratings_truspilot" class="col-md-2 col-form-label text-md-right"> Ratings on Trustpilot :</label>
                                <div class="col-md-4">
                                    <input id=" ratings_truspilot" type="text" class="form-control" name="ratings_truspilot" value="{{ $produit->ratings_truspilot}}">
                                </div>

                                <label for="confirmed_customer" class="col-md-2 col-form-label text-md-right">Confirmed customer :</label>
                                <div class="col-md-4">
                                    <input id="confirmed_customer" type="text" class="form-control" name="confirmed_customer" value="{{ $produit->confirmed_customer}}">
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="temporary_offer" class="col-md-2 col-form-label text-md-right">Offre temporaire :</label>
                            <div class="col-md-4">
                                <input id="temporary_offer" type="text" class="form-control" name="temporary_offer" value="{{ $produit->temporary_offer }}">
                            </div>

                                <label for="message" class="col-md-2 col-form-label text-md-right">Message :</label>
                                <div class="col-md-4">
                                    <input id="message" type="text" class="form-control" name="message" value="{{ $produit->message }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cta_text" class="col-md-2 col-form-label text-md-right">Texte CTA :</label>
                                <div class="col-md-4">
                                    <input id="cta_text" type="text" class="form-control" name="cta_text" value="{{ $produit->cta_text }}">
                                </div>

                                <label for="cta_description" class="col-md-2 col-form-label text-md-right">Description CTA :</label>
                                <div class="col-md-4">
                                    <input id="cta_description" type="text" class="form-control" name="cta_description" value="{{ $produit->cta_description }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="termes_legaux" class="col-md-2 col-form-label text-md-right">Termes légaux :</label>
                                <div class="col-md-4">
                                    <input id="termes_legaux" type="text" class="form-control" name="termes_legaux" value="{{ $produit->termes_legaux }}">
                                </div>

                                <label for="politique" class="col-md-2 col-form-label text-md-right">Politique  :</label>
                                <div class="col-md-4">
                                    <input id="politique" type="text" class="form-control" name="politique" value="{{ $produit->politique }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="garanties_retours" class="col-md-2 col-form-label text-md-right">Garanties et retours :</label>
                                <div class="col-md-4">
                                    <input id="garanties_retours" type="text" class="form-control" name="garanties_retours"  value="{{ $produit->garanties_retours }}">
                                </div>

                                <label for="termes_conditions" class="col-md-2 col-form-label text-md-right">Termes et conditions  :</label>
                                <div class="col-md-4">
                                    <input id="termes_conditions" type="text" class="form-control" name="termes_conditions" value="{{ $produit->termes_conditions }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pub_1" class="col-md-2 col-form-label text-md-right">PUB_1 :</label>
                                <div class="col-md-4">
                                    <input id="pub_1" type="text" class="form-control" name="pub_1" value="{{ $produit->pub_1 }}">
                                </div>

                                <label for="pub_2" class="col-md-2 col-form-label text-md-right">PUB_2 :</label>
                                <div class="col-md-4">
                                    <input id="pub_2" type="text" class="form-control" name="pub_2"  value="{{ $produit->pub_2 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pub_3" class="col-md-2 col-form-label text-md-right">PUB_3 :</label>
                                <div class="col-md-4">
                                    <input id="pub_3" type="text" class="form-control" name="pub_3"  value="{{ $produit->pub_3 }}">
                                </div>

                                <label for="pub_4" class="col-md-2 col-form-label text-md-right">PUB_4:</label>
                                <div class="col-md-4">
                                    <input id="pub_4" type="text" class="form-control" name="pub_4"  value="{{ $produit->pub_4 }}">
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="image_produit" class="col-md-2 col-form-label text-md-right">IMAGE PRODUIT :</label>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input id="image_produit" type="file" class="custom-file-input" name="image_produit[]" multiple>
                                    <label class="custom-file-label" for="image_produit">Choisir des images</label>
                                </div>
                                @foreach ($produit->image_produit as $image)
                                    <img src="{{ asset('storage/images_produit/' . $image) }}" class="img-thumbnail" style="width: 150px; margin-top: 10px;" alt="Image produit">
                                @endforeach
                            </div>
                                <label for="image_reviews" class="col-md-2 col-form-label text-md-right">IMAGE REVIEWS :</label>
                                <div class="col-md-4">
                                    <div class="custom-file">
                                        <input id="image_reviews" type="file" class="custom-file-input" name="image_reviews[]" multiple>
                                        <label class="custom-file-label" for="image_reviews">Choisir des images</label>
                                    </div>
                                    <div id="selected-reviews-images" style="margin-top: 10px;"></div>
                                </div>
                            </div>

                            <div class="form-group row" id="additional-reviews"> 
                            <label for="image_description" class="col-md-2 col-form-label text-md-right">IMAGE DESCRIPTION :</label>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input id="image_description" type="file" class="custom-file-input" name="image_descr
                                    iption[]" multiple>
                                    <label class="custom-file-label" for="image_description">Choisir des images</label>
                                </div>
                                <div id="selected-image-description" style="margin-top: 10px;"></div>
                            </div>

                                <label for="logo" class="col-md-2 col-form-label text-md-right">LOGO :</label>
                                <div class="col-md-4">
                                    <div class="custom-file">
                                        <input id="logo" type="file" class="custom-file-input" name="logo">
                                        <label class="custom-file-label" for="logo">Choisir un logo</label>
                                    </div>
                                    <div id="selected-logo" style="margin-top: 10px;"></div>
                                </div>
                            </div>
                            <div class="form-group row" id="additional-reviews"> 
                            <label for="reviews_principale" class="col-md-2 col-form-label text-md-right">REVIEWS PRINCIPALE:</label>
                            <div class="col-md-4">
                                @foreach ($produit->reviews_principale as $reviewPrincipale)
                                <div class="input-group" style="margin-top: 10px;">
                                    <input id="reviews_principale" type="text" class="form-control" name="reviews_principale[]" value="{{ $reviewPrincipale }}">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-success btn-sm" id="add-reviews_principale">+</button>
                                    </div>
                                </div>
                                @endforeach
                                <div id="additional-reviews_principale" class="col-md-14 offset-md-0"></div>
                            </div>
                                <label for="qualite" class="col-md-2 col-form-label text-md-right">QUALITE :</label>
                                <div class="col-md-4">
                                    @foreach ($produit->qualite as $qualite)
                                    <div class="input-group"  style="margin-top: 10px;">
                                        <input id="qualite" type="text" class="form-control" name="qualite[]" value="{{ $qualite }}">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-success btn-sm" id="add-qualite">+</button>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div id="additional-qualite_container" class="col-md-14 offset-md-0"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="reviews" class="col-md-2 col-form-label text-md-right">REVIEWS:</label>
                            <div class="col-md-4">
                                @foreach ($produit->reviews as $review)
                                <div class="input-group" style="margin-top: 10px;">
                                    <input id="reviews" type="text" class="form-control" name="reviews[]" value="{{ $review }}">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-success btn-sm" id="add-reviews">+</button>
                                    </div>
                                </div>
                                @endforeach
                                <div id="additional-reviews_container" class="col-md-14 offset-md-0"></div>
                            </div>
                            <label for="statut" class="col-md-2 col-form-label text-md-right">STATUT :</label>
                            <div class="col-md-4">
                                <select id="statut" class="form-control" name="statut">
                                    <option value="APPROVED" {{ $produit->statut == 'APPROVED' ? 'selected' : '' }}>APPROVED</option>
                                    <option value="PENDING" {{ $produit->statut == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                                    <option value="REJECTED" {{ $produit->statut == 'REJECTED' ? 'selected' : '' }}>REJECTED</option>
                                    <option value="DELIVERED" {{ $produit->statut == 'DELIVERED' ? 'selected' : '' }}>DELIVERED</option>
                                    <option value="DUPLICATED" {{ $produit->statut == 'DUPLICATED' ? 'selected' : '' }}>DUPLICATED</option>
                                </select>
                            </div>

                            </div>

                        <div class="form-group row">
                            <label for="template_id" class="col-md-2 col-form-label text-md-right">TEMPLATE :</label>
                            <div class="col-md-4">
                                <select id="template_id" class="form-control" name="template_id" required>
                                    @foreach($templates as $template)
                                        <option value="{{ $template->id }}" {{ $template->id == $produit->template_id ? 'selected' : '' }}>
                                            {{ $template->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                            <div class="form-group row mb-0 text-center"> 
                                <div class="col-md-12"> 
                                    <button type="submit" class="btn btn-info btn-lg">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
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
    </style>
@endpush
