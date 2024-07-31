@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="text-align: center; font-size: 24px;">Product</div>
                    <div class="card-body">
                    <form id="form-id" method="POST" action="{{ route('produit.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row">
                                <label for="nom_produit" class="col-md-2 col-form-label text-md-right">PRODUCT :</label>
                                <div class="col-md-4">
                                    <input id="nom_produit" type="text" class="form-control" name="nom_produit" required>
                                </div>  
                            </div>  
                            <div class="form-group row">
                            <label for="mini_description" class="col-md-2 col-form-label text-md-right">MINI_DESCRIPTION :</label>
                                <div class="col-md-4">
                                    <textarea id="mini_description" class="form-control" name="mini_description" required></textarea>
                                </div>
                                <label for="description" class="col-md-2 col-form-label text-md-right">DESCRIPTION :</label>
                                <div class="col-md-4">
                                    <textarea id="description" class="form-control" name="description" required></textarea>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label for="prix" class="col-md-2 col-form-label text-md-right">PRICE :</label>
                                <div class="col-md-4">
                                    <input id="prix" type="text" class="form-control" name="prix" required>
                                </div>

                                <label for="nouveau_prix" class="col-md-2 col-form-label text-md-right">NEW PRICE :</label>
                                <div class="col-md-4">
                                    <input id="nouveau_prix" type="text" class="form-control" name="nouveau_prix" value="9.99">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="geo" class="col-md-2 col-form-label text-md-right">GEO :</label>
                                <div class="col-md-4">
                                <select id="geo" class="select2" data-width="100%" name="geo"></select>
                                </div>

                                <label for="devise" class="col-md-2 col-form-label text-md-right">CURRENCY :</label>
                                <div class="col-md-4">
                                    <input id="devise" type="text" class="form-control" name="devise" readonly>
                                    <img id="flag" src="" alt="" class="flag-icon">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="alias" class="col-md-2 col-form-label text-md-right">ALIAS :</label>
                                <div class="col-md-4">
                                    <input id="alias" type="text" class="form-control" name="alias" placeholder="GEO-PRODUCTNAME" required>
                                </div>

                                <label for="stock_restant" class="col-md-2 col-form-label text-md-right">REMAINING STOCK:</label>
                                <div class="col-md-4">
                                    <input id="stock_restant" type="text" class="form-control" name="stock_restant" value="12% of remaining stock">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="livraison_promo" class="col-md-2 col-form-label text-md-right">Delivery Promo :</label>
                                <div class="col-md-4">
                                    <input id="livraison_promo" type="text" class="form-control" name="livraison_promo" value="FREE SHIPPING: Order NOW to get it before " required>
                                </div>

                                <label for="notation" class="col-md-2 col-form-label text-md-right">RATING:</label>
                                <div class="col-md-4">
                                    <input id="notation" type="text" class="form-control" name="notation" value="4.9/5 from more than5,000 satisfied customers on Trustpilot">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="livraison_gratuite" class="col-md-2 col-form-label text-md-right">FREE SHIPPING:</label>
                                <div class="col-md-4">
                                    <input id="livraison_gratuite" type="text" class="form-control" name="livraison_gratuite" value="Free delivery" required>
                                </div>

                                <label for="offer" class="col-md-2 col-form-label text-md-right">EXCLUSIVE LIMITED OFFER :</label>
                                <div class="col-md-4">
                                    <input id="offer" type="text" class="form-control" name="offer" value="Exclusive Limited Offer">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paiement" class="col-md-2 col-form-label text-md-right">SECURE PAYMENT :</label>
                                <div class="col-md-4">
                                    <input id="paiement" type="text" class="form-control" name="paiement" value="Secure payment" required>
                                </div>
                                <label for="avis_clients" class="col-md-2 col-form-label text-md-right">CUSTOMER REVIEWS:</label>
                                <div class="col-md-4">
                                    <input id="avis_clients" type="text" class="form-control" name="avis_clients" value="Reviews from our customers">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="about" class="col-md-2 col-form-label text-md-right">ABOUT :</label>
                                <div class="col-md-4">
                                    <input id="about" type="text" class="form-control" name="about" value="About" required>
                                </div>

                                <label for="more_about" class="col-md-2 col-form-label text-md-right">MORE ABOUT :</label>
                                <div class="col-md-4">
                                    <input id="more_about" type="text" class="form-control" name="more_about" value="More about">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=" ratings_truspilot" class="col-md-2 col-form-label text-md-right">RATINGS ON TRUSTPILOT :</label>
                                <div class="col-md-4">
                                    <input id=" ratings_truspilot" type="text" class="form-control" name="ratings_truspilot" value="4.9/5 Ratings on Truspilot" required>
                                </div>

                                <label for="confirmed_customer" class="col-md-2 col-form-label text-md-right">CONFIRMED CUSTOMER :</label>
                                <div class="col-md-4">
                                    <input id="confirmed_customer" type="text" class="form-control" name="confirmed_customer" value="Confirmed customer" required>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="temporary_offer" class="col-md-2 col-form-label text-md-right">TEMPORARY OFFER :</label>
                            <div class="col-md-4">
                                <input id="temporary_offer" type="text" class="form-control" name="temporary_offer" value="Temporary & exceptional offer!" required>
                            </div>

                                <label for="message" class="col-md-2 col-form-label text-md-right">MESSAGE :</label>
                                <div class="col-md-4">
                                    <input id="message" type="text" class="form-control" name="message" value="We exceptionally sell our products at wholesale prices, take advantage of it!" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cta_text" class="col-md-2 col-form-label text-md-right">TEXT CTA :</label>
                                <div class="col-md-4">
                                    <input id="cta_text" type="text" class="form-control" name="cta_text" required value="BUY NOW" required>
                                </div>

                                <label for="cta_description" class="col-md-2 col-form-label text-md-right">DESCRIPTION CTA :</label>
                                <div class="col-md-4">
                                    <input id="cta_description" type="text" class="form-control" name="cta_description" value="Max. of 1 order per household."required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="termes_legaux" class="col-md-2 col-form-label text-md-right">LEGAL TERMS :</label>
                                <div class="col-md-4">
                                    <input id="termes_legaux" type="text" class="form-control" name="termes_legaux" value="Legal terms" required>
                                </div>

                                <label for="politique" class="col-md-2 col-form-label text-md-right">POLICY  :</label>
                                <div class="col-md-4">
                                    <input id="politique" type="text" class="form-control" name="politique" value="Policy">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="garanties_retours" class="col-md-2 col-form-label text-md-right">WARRANTIES AND RETURNS :</label>
                                <div class="col-md-4">
                                    <input id="garanties_retours" type="text" class="form-control" name="garanties_retours"  value="Warranties and returns" required>
                                </div>

                                <label for="termes_conditions" class="col-md-2 col-form-label text-md-right">TERMS AND CONDITIONS :</label>
                                <div class="col-md-4">
                                    <input id="termes_conditions" type="text" class="form-control" name="termes_conditions" value="Terms and conditions" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pub_1" class="col-md-2 col-form-label text-md-right">PUB_1 :</label>
                                <div class="col-md-4">
                                    <input id="pub_1" type="text" class="form-control" name="pub_1" value="FREE DELIVERY" required>
                                </div>

                                <label for="pub_2" class="col-md-2 col-form-label text-md-right">PUB_2 :</label>
                                <div class="col-md-4">
                                    <input id="pub_2" type="text" class="form-control" name="pub_2" value="on all orders placed today!" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pub_3" class="col-md-2 col-form-label text-md-right">PUB_3 :</label>
                                <div class="col-md-4">
                                    <input id="pub_3" type="text" class="form-control" name="pub_3" value="FREE REFUND for 60 days after purchase" required>
                                </div>

                                <label for="pub_4" class="col-md-2 col-form-label text-md-right">PUB_4:</label>
                                <div class="col-md-4">
                                    <input id="pub_4" type="text" class="form-control" name="pub_4" value="Only a few are left in stock " required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image_produit" class="col-md-2 col-form-label text-md-right">PRODUCT IMAGE :</label>
                                <div class="col-md-4">
                                    <div class="custom-file">
                                    <input id="image_produit" type="file" class="custom-file-input" name="image_produit[]" multiple required>
                                        <label class="custom-file-label" for="image_produit">SELECT IMAGES</label>
                                    </div>
                                    <div id="selected-images" style="margin-top: 10px;" ></div>
                                </div>
                                <label for="image_reviews" class="col-md-2 col-form-label text-md-right">IMAGE REVIEWS :</label>
                                <div class="col-md-4">
                                    <div class="custom-file">
                                        <input id="image_reviews" type="file" class="custom-file-input" name="image_reviews[]" multiple required>
                                        <label class="custom-file-label" for="image_reviews">SELECT IMAGES</label>
                                    </div>
                                    <div id="selected-reviews-images" style="margin-top: 10px;"></div>
                                </div>
                            </div>

                            <div class="form-group row" id="additional-reviews"> 
                            <label for="image_description" class="col-md-2 col-form-label text-md-right">IMAGE DESCRIPTION :</label>
                            <div class="col-md-4">
                                <div class="custom-file">
                                    <input id="image_description" type="file" class="custom-file-input" name="image_description[]" multiple required>
                                    <label class="custom-file-label" for="image_description">SELECT IMAGES</label>
                                </div>
                                <div id="selected-image-description" style="margin-top: 10px;"></div>
                            </div>
                                <label for="logo" class="col-md-2 col-form-label text-md-right">LOGO :</label>
                                <div class="col-md-4">
                                    <div class="custom-file">
                                        <input id="logo" type="file" class="custom-file-input" name="logo" required>
                                        <label class="custom-file-label" for="logo">SELECT IMAGE</label>
                                    </div>
                                    <div id="selected-logo" style="margin-top: 10px;"></div>
                                </div>
                            </div>
                            <div class="form-group row" id="additional-reviews"> 
                            <label for="reviews_principale" class="col-md-2 col-form-label text-md-right">REVIEWS PRINCIPALE:</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input id="reviews_principale" type="text" class="form-control" name="reviews_principale[]" required>
                                        <div class="input-group-append">
                                          <button type="button" class="btn btn-success btn-sm" id="add-reviews_principale">+</button>
                                        </div>
                                    </div>
                                    <div id="additional-reviews_principale" class="col-md-14 offset-md-0"></div>

                                </div>
                                <label for="qualite" class="col-md-2 col-form-label text-md-right">QUALITY :</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input id="qualite" type="text" class="form-control" name="qualite[]" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-success btn-sm" id="add-qualite">+</button>
                                        </div>
                                    </div>
                                    <div id="additional-qualite_container" class="col-md-14 offset-md-0"></div>
                                </div>
                            </div>
                            <div class="form-group row" > 
                            <label for="reviews" class="col-md-2 col-form-label text-md-right">REVIEWS:</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input id="reviews" type="text" class="form-control" name="reviews[]" required>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-success btn-sm" id="add-reviews">+</button>
                                    </div>
                                </div>
                                <div id="additional-reviews_container" class="col-md-14 offset-md-0"></div>
                            </div>
                        
                                <label for="statut" class="col-md-2 col-form-label text-md-right">STATUS :</label>
                                <div class="col-md-4">
                                    <select id="statut" class="form-control" name="statut" >
                                        <option value="APPROVED">APPROVED</option>
                                        <option value="PENDING" selected>PENDING</option>
                                        <option value="REJECTED">REJECTED</option>
                                        <option value="DELIVERED">DELIVERED</option>
                                        <option value="DUPLICATED">DUPLICATED</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="template_id" class="col-md-2 col-form-label text-md-right">TEMPLATE :</label>
                                
                               
                            </div>
                            <div class="form-group row mb-0 text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-info btn-lg">Register</button>
                                </div>
                            </div>
                            
                        </form>
                        <!-- <button class="cta"  type="button" id="preview-button">
                            <span>Preview</span>
                            <svg width="15px" height="10px" viewBox="0 0 13 10"><path d="M1,5 L11,5"></path><polyline points="8 1 12 5 8 9"></polyline></svg>
                            </button> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="card">
                    <div class="card-header" style="text-align: center; font-size: 24px;">Preview</div>
                    <div class="card-body">
                        <div id="template-preview"></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>
  #template-preview {
    max-height: 1645px; 
    overflow-y: auto; 
  }
</style>
@endpush

@include('layouts.pages.preview.script_p')
