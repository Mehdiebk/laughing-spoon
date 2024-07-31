<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Template;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    protected $produit;

    public function __construct()
    {
        $this->produit = new Produit();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $this->produit->query();
    
        if ($request->has('search') && $request->input('search') !== '') {
            $search = $request->input('search');
            $query->where('nom_produit', 'like', "%{$search}%")
                  ->orWhere('prix', 'like', "%{$search}%")
                  ->orWhere('statut', 'like', "%{$search}%");
        }
    
        $produits = $query->paginate(10);
        
        $totalProduits = Produit::count();
        $produitsApprouves = Produit::where('statut', 'APPROVED')->count();
        $produitsEnAttente = Produit::where('statut', 'PENDING')->count();

        return view('welcome', compact('produits', 'totalProduits', 'produitsApprouves', 'produitsEnAttente'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $templates = Template::all();
        return view('layouts.pages.create', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
    */
    
    public function store(Request $request)
    {
        $data = $request->all();

        $productImages = [];
        if ($request->hasFile('image_produit')) {
            foreach ($request->file('image_produit') as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $image->storeAs('images_produit', $filename, 'public');
                $productImages[] = $filename;
            }
        }

        $reviewImages = [];
        if ($request->hasFile('image_reviews')) {
            foreach ($request->file('image_reviews') as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $image->storeAs('images_reviews', $filename, 'public');
                $reviewImages[] = $filename;
            }
        }

        $data['image_produit'] = $productImages;
        $data['image_reviews'] = $reviewImages;

        if ($request->hasFile('logo')) {
            $filename = uniqid() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('logos', $filename, 'public');
            $data['logo'] = $filename;
        }

        $descriptionImages = [];
        if ($request->hasFile('image_description')) {
            $files = $request->file('image_description');
            
            if (count($files) > 2) {
                return redirect()->back()->with('error', 'Vous pouvez sélectionner un maximum de 2 images pour la description.');
            }
            
            foreach ($files as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $image->storeAs('image_descriptions', $filename, 'public');
                $descriptionImages[] = $filename;
            }
        }
        $data['image_description'] = $descriptionImages;

        Produit::create($data);

        return redirect()->back()->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
       
        $produit = Produit::findOrFail($id);
        return view('layouts.pages.details', compact('produit'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = Produit::findOrFail($id);
        $templates = Template::all();
        
        return view('layouts.pages.edit', compact('produit', 'templates'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $produit = Produit::findOrFail($id);
    $data = $request->all();

    // Gestion des images de produit
    $productImages = $produit->image_produit;
    if ($request->hasFile('image_produit')) {
        $productImages = [];
        foreach ($request->file('image_produit') as $image) {
            $filename = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('images_produit', $filename, 'public');
            $productImages[] = $filename;
        }
    }
    $data['image_produit'] = $productImages;

    // Gestion des images de reviews
    $reviewImages = $produit->image_reviews;
    if ($request->hasFile('image_reviews')) {
        $reviewImages = [];
        foreach ($request->file('image_reviews') as $image) {
            $filename = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('images_reviews', $filename, 'public');
            $reviewImages[] = $filename;
        }
    }
    $data['image_reviews'] = $reviewImages;

    // Gestion de l'image de logo
    if ($request->hasFile('logo')) {
        $filename = uniqid() . '_' . $request->file('logo')->getClientOriginalName();
        $request->file('logo')->storeAs('logos', $filename, 'public');
        $data['logo'] = $filename;
    } else {
        $data['logo'] = $produit->logo;
    }

    // Gestion des images de description
    $descriptionImages = $produit->image_description;
    if ($request->hasFile('image_description')) {
        $descriptionImages = [];
        foreach ($request->file('image_description') as $image) {
            $filename = uniqid() . '_' . $image->getClientOriginalName();
            $image->storeAs('image_descriptions', $filename, 'public');
            $descriptionImages[] = $filename;
        }
    }
    $data['image_description'] = $descriptionImages;

    // Mettre à jour le produit avec les nouvelles données
    $produit->update($data);

    return redirect('produit')->with('success', 'Produit mis à jour avec succès.');
}

    
    /**
     * Remove the specified resource from storage.
    */

    public function destroy(string $id)
    {
        $produit = $this->produit->find($id);
        $produit->delete();
        return redirect('produit');   
    }
     
    public function updateStatus(Request $request, $id)
    {
        $produit = Produit::find($id);
     
        if ($produit) {
            $produit->statut = $request->input('statut');
            $produit->save();
            return response()->json(['success' => true]);
        }
     
        return response()->json(['success' => false, 'message' => 'Produit not found'], 404);
    }  
     
    public function preview(Request $request)
    {
        $data = $request->only([
            'nom_produit',
            'description',
            'prix',
            'nouveau_prix',
            'image_produit',
            'image_reviews',
            'reviews',
            'logo',
            'statut',
            'mini_description',
            'image_description',
            'qualite',
            'reviews_principale',
            'devise',
            'geo',
            'template_id',
            'alias',
            'stock_restant',
            'livraison_promo',
            'notation',
            'livraison_gratuite',
            'offer',
            'paiement',
            'about',
            'more_about',
            'avis_clients',
            'temporary_offer',
            'message',
            'confirmed_customer',
            'ratings_truspilot',
            'cta_text',
            'cta_description',
            'termes_legaux',
            'politique',
            'garanties_retours',
            'termes_conditions',
            'pub_1',
            'pub_2',
            'pub_3',
            'pub_4',
        ]);

        // REVIEWS PRINCIPALE:
        if (is_array($data['reviews_principale'])) {
            $data['reviews_principale_1'] = $data['reviews_principale'][0] ?? null;
            $data['reviews_principale_2'] = $data['reviews_principale'][1] ?? null;
        } else {
            $data['reviews_principale_1'] = $data['reviews_principale'];
            $data['reviews_principale_2'] = $data['reviews_principale'];
        }

        // REVIEWS
        if (is_array($data['reviews'])) {
            for ($i = 0; $i < 9; $i++) {
                $data['reviews_' . ($i + 1)] = $data['reviews'][$i] ?? null;
            }
        } else {
            for ($i = 0; $i < 9; $i++) {
                $data['reviews_' . ($i + 1)] = $data['reviews'];
            }
        }

        // IMAGE PRODUIT
        if ($request->hasFile('image_produit')) {
            $imagePaths = [];
            foreach ($request->file('image_produit') as $file) {
                $imagePath = $file->store('images_produit', 'public');
                $imagePaths[] = asset('storage/' . $imagePath);
            }
            $data['image_produit_paths'] = $imagePaths;
        } else {
            $data['image_produit_paths'] = [];
        }

        // LOGO
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $data['logo'] = asset('storage/' . $logoPath);
        }    

        // IMAGE DESCRIPTION 
        $imageDescriptionPaths = [];
        if ($request->hasFile('image_description')) {
            $files = $request->file('image_description');
            for ($i = 0; $i < min(2, count($files)); $i++) {
                $imageDescriptionPath = $files[$i]->store('image_descriptions', 'public');
                $imageDescriptionPaths[] = asset('storage/' . $imageDescriptionPath);
            }
        }
        $data['image_description_1'] = $imageDescriptionPaths[0] ?? null;
        $data['image_description_2'] = $imageDescriptionPaths[1] ?? null;

        // IMAGE REVIEWS
        if ($request->hasFile('image_reviews')){
            $imageReviewsPaths = [];
            foreach ($request->file('image_reviews') as $file) {
                $imageReviewsPath = $file->store('image_reviews', 'public');
                $imageReviewsPaths[] = asset('storage/' . $imageReviewsPath);
            }
            for ($i = 0; $i < 6; $i++) {
                $data['image_reviews_' . ($i + 1)] = $imageReviewsPaths[$i] ?? null;
            }
        } else {
            for ($i = 0; $i < 6; $i++) {
                $data['image_reviews_' . ($i + 1)] = null;
            }
        }

        // STATIC IMAGES
        $data['image_1'] = asset('images_statiques/1.png');
        $data['image_2'] = asset('images_statiques/2.png');
        $data['image_3'] = asset('images_statiques/3.png');
        $data['brands'] = asset('images_statiques/brands.png');
        $data['trustpilot'] = asset('images_statiques/trustpilot.png');

        return view('layouts.pages.preview.preview', $data);
    }


    
}
