<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.css')

    <style type="text/css">
        .page-content {
            padding: 30px;
            background-color: #1a1a1a;
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            color: #9709e9;
            font-size: 28px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #9709e9;
        }

        .search-container {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #251a2e;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .search-container input {
            flex: 1;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background: #3b0f60;
            color: #e0e0e0;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .search-container input:focus {
            outline: none;
            box-shadow: 0 0 0 2px #9709e9;
        }

        .search-container input::placeholder {
            color: #888;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            padding: 20px;
        }

        .card {
            background: #2a2a2a;
            border: 1px solid #444;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .card-image-container {
            position: relative;
            width: 100%;
            padding-top: 66.67%; /* Proporção 3:2 */
            overflow: hidden;
        }

        .moto-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card:hover .moto-image {
            transform: scale(1.05);
        }

        .card-content {
            padding: 20px;
        }

        .card-title {
            color: #fff;
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .card-info {
            color: #aaa;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .card-actions {
            display: flex;
            gap: 10px;
            padding: 15px 20px;
            background: #222;
            border-top: 1px solid #444;
        }

        .button-details {
            flex: 1;
            background-color: #9709e9;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .button-details:hover {
            background-color: #7d0cff;
            transform: translateY(-2px);
        }

        .button-details.delete {
            background-color: #dc3545;
        }

        .button-details.delete:hover {
            background-color: #c82333;
        }

        .button-details.edit {
            background-color: #3128a7;
        }

        .button-details.edit:hover {
            background-color: #2b2188;
        }

        @media (max-width: 1200px) {
            .card-container {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }

            .card-container {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 15px;
            }

            .search-container {
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .page-content {
                padding: 15px;
            }

            .card-container {
                grid-template-columns: 1fr;
            }

            .card-actions {
                flex-direction: column;
            }
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            background-color: #333;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 12px;
            width: 90%;
            max-width: 1200px;
            border-radius: 8px;
            display: flex;
            flex-direction: row;
            gap: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            max-height: 85vh;
            overflow-y: auto;
        }

        .modal-left {
            width: 30%;
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-height: 80vh;
            overflow-y: auto;
            padding-right: 15px;
            min-width: 300px;
        }

        .modal-right {
            width: 70%;
            padding: 10px;
            color: white;
            overflow-y: auto;
            max-height: 80vh;
            border-left: 1px solid #444;
            padding-left: 15px;
            flex: 1;
        }

        .modal-right strong {
            color: rgb(245, 0, 245);
        }

        .main-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .image-gallery {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-height: 70vh;
            overflow-y: auto;
            padding-right: 10px;
            width: 100%;
        }

        .image-gallery img {
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .image-gallery img:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.2s;
        }

        .close:hover,
        .close:focus {
            color: white;
            text-decoration: none;
        }

        h3 {
            color: #7FB3D5;
            font-size: 24px;
            margin-bottom: 15px;
            margin-top: 12.5px;
        }

        h4 {
            color: rgb(245, 0, 245);
            font-size: 18px;
            margin-bottom: 10px;
            border-bottom: 2px solid rgb(245, 0, 245);
            padding-bottom: 5px;
        }

        .details-section {
            margin-bottom: 20px;
        }

        .details-section h4 {
            margin-bottom: 10px;
        }

        .details-section p {
            margin: 8px 0;
            font-size: 14px;
            color: #ddd;
        }

        .details-section strong {
            color: rgb(245, 0, 245);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-body {
            display: flex;
            flex-direction: row;
            gap: 20px;
        }

        .modal-footer {
            text-align: right;
            margin-top: 20px;
        }

        .modal-footer button {
            background-color: purple;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .modal-footer button:hover {
            background-color: #45a049;
        }

        .image-container {
        position: relative;
            margin-bottom: 15px;
            width: 100%;
            height: auto;
            border: 1px solid #444;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 0;
            object-fit: cover;
            display: block;
            max-height: 300px;
        }

        .current-images-section {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        .current-images-section h4, .new-images-section h4 {
            margin-bottom: 15px;
            color: #9935dc;
            border-bottom: 1px solid #3d4148;
            padding-bottom: 8px;
            text-align: center;
        }

        .images-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
}

.delete-button {
    position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(220, 53, 69, 0.8);
    color: white;
    border: none;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
    cursor: pointer;
            border-radius: 50%;
            transition: background-color 0.3s;
            z-index: 10;
}

.delete-button:hover {
            background-color: rgba(200, 35, 51, 1);
}

input[type="text"],
input[type="number"],
input[type="file"] {
    border: 1px solid #555;
    border-radius: 6px;
    background-color: #222;
    color: white;
    font-size: 16px;
    transition: all 0.3s;
}

input[type="text"]:focus,
input[type="number"]:focus,
input[type="file"]:focus {
    outline: none;
}

.search-container {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #251a2e;
    padding: 10px;
    border-radius: 8px;
  }

  .search-container input {
    flex: 1;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background: #3b0f60;
    color: #e0e0e0;
    font-size: 16px;
  }

  .search-container input::placeholder {
    color: #888;
  }

  .search-button {
    background: #7d0cff;
    border: none;
    padding: 10px 15px;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
  }

  .search-button:hover {
    background: #5909b1;
  }

        .form-section {
            background-color: #343a40;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #3d4148;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .form-group {
            flex: 0 0 calc(50% - 20px);
            margin: 0 10px 20px;
        }

        @media (max-width: 992px) {
            .form-group {
                flex: 0 0 calc(100% - 20px);
            }
            
            .modal-content {
                flex-direction: row;
                overflow-y: auto;
            }
            
            .modal-left {
                width: 30%;
                min-width: 250px;
                overflow-y: auto;
                max-height: 80vh;
            }
            
            .modal-right {
                width: 70%;
                overflow-y: auto;
                max-height: 80vh;
            }
        }

        @media (max-width: 768px) {
            .modal-content {
                flex-direction: column;
            }
            
            .modal-left, .modal-right {
                width: 100%;
                min-width: auto;
                padding: 0;
                border-left: none;
            }
            
            .modal-right {
                margin-top: 20px;
            }
        }

        .form-label {
            display: block;
            font-size: 14px;
            color: #adb5bd;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            height: 40px;
            background-color: #2d3035;
            border: 1px solid #3d4148;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #9935dc;
            outline: none;
        }

        textarea.form-control {
            height: 100px;
            resize: vertical;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        .button-details:hover {
            background-color: #7d0cff;
            transform: translateY(-2px);
        }

        input[type="file"] {
            background-color: #2d3035;
            border: 1px dashed #3d4148;
            padding: 10px;
            border-radius: 4px;
            margin-top: 10px;
            width: 100%;
        }

        .section-title {
            color: #9935dc;
            font-size: 18px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #3d4148;
        }

        /* Estilização para o scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #2d3035;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #9709e9;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #7d0cff;
        }

        .form-hint {
            display: block;
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .loading-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #9709e9;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .success-message.show {
            opacity: 1;
        }

        .error-message {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .error-message.show {
            opacity: 1;
        }

        .current-images-section, .new-images-section {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            width: 100%;
        }

        .current-images-section h4, .new-images-section h4 {
            margin-bottom: 15px;
            color: #9935dc;
            border-bottom: 1px solid #3d4148;
            padding-bottom: 8px;
            text-align: center;
        }

        .image-gallery {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-height: 70vh;
            overflow-y: auto;
            padding-right: 10px;
        }

        /* Estilização para o scrollbar da galeria de imagens */
        .image-gallery::-webkit-scrollbar {
            width: 6px;
        }

        .image-gallery::-webkit-scrollbar-track {
            background: #2d3035;
            border-radius: 4px;
        }

        .image-gallery::-webkit-scrollbar-thumb {
            background: #9709e9;
            border-radius: 4px;
        }

        .image-gallery::-webkit-scrollbar-thumb:hover {
            background: #7d0cff;
        }

        /* Estilos específicos para o modal de edição */
        #editModal .modal-content {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: nowrap !important;
            align-items: flex-start !important;
            max-width: 1200px !important;
            width: 90% !important;
            margin: 5% auto !important;
            padding: 20px !important;
            background-color: #333 !important;
            border-radius: 12px !important;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4) !important;
            max-height: 85vh !important;
            overflow-y: auto !important;
        }

        #editModal .edit-form {
            display: flex !important;
            flex-direction: row !important;
            width: 100% !important;
            gap: 20px !important;
        }

        #editModal .modal-left {
            flex: 0 0 30% !important;
            min-width: 300px !important;
            max-width: 400px !important;
            padding-right: 15px !important;
            border-right: 1px solid #444 !important;
            overflow-y: auto !important;
            max-height: 80vh !important;
        }

        #editModal .modal-right {
            flex: 1 !important;
            padding-left: 15px !important;
            overflow-y: auto !important;
            max-height: 80vh !important;
        }

        @media (max-width: 992px) {
            #editModal .modal-content,
            #editModal .edit-form {
                flex-direction: row !important;
            }
            
            #editModal .modal-left {
                flex: 0 0 30% !important;
                min-width: 250px !important;
            }
            
            #editModal .modal-right {
                flex: 1 !important;
            }
        }

        @media (max-width: 768px) {
            #editModal .modal-content,
            #editModal .edit-form {
                flex-direction: column !important;
            }
            
            #editModal .modal-left, 
            #editModal .modal-right {
                flex: 0 0 100% !important;
                width: 100% !important;
                max-width: 100% !important;
                min-width: 100% !important;
                padding: 0 !important;
                border-right: none !important;
            }
            
            #editModal .modal-right {
                margin-top: 20px !important;
            }
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <h1 class="page-title">Manage Motorcycle</h1>
                <div class="search-container">
                <input type="text" id="search" placeholder="Pesquisar motocicletas por nome ou marca..." />
                </div>
        </div>

                <div class="card-container">
                    @foreach ($motorcycles as $motorcycle)
                        <div class="card">
                    <div class="card-image-container">
                            @if($motorcycle->photos->isNotEmpty())
                                <img src="{{ asset('motorcycles/' . $motorcycle->photos->first()->image) }}" alt="{{ $motorcycle->name }}" class="moto-image">
                            @else
                                <img src="{{ asset('default-image.jpg') }}" alt="Default Image" class="moto-image">
                            @endif
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">{{ $motorcycle->name }}</h3>
                        <p class="card-info">
                            <strong>Marca:</strong> {{ $motorcycle->brand->brand_name }}<br>
                            <strong>Preço:</strong> €{{ number_format($motorcycle->price, 2, ',', '.') }}
                        </p>
                    </div>
                    <div class="card-actions">
                        <button class="button-details" onclick="openModal({{ $motorcycle->id }})">Details</button>
                        <button class="button-details edit" onclick="openEditModal({{ $motorcycle->id }})">Edit</button>
                        <button class="button-details delete" onclick="deleteMotorcycle({{ $motorcycle->id }})">Delete</button>
                    </div>
                        </div>
                    @endforeach
                </div>

                <!-- Modal for motorcycle details -->
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <div class="modal-left">
                            <div class="image-gallery" id="image-gallery">
                                <!-- Main image will be inserted here -->
                            </div>
                        </div>
                        <div class="modal-right">
                            <h3 id="modal-title"></h3>
                            <p><strong>Brand:</strong> <span id="modal-brand"></span></p>
                            <p><strong>Price:</strong> <span id="modal-price"></span></p>
                            <p><strong>Description:</strong> <span id="modal-description"></span></p>
                            <p><strong>License Type:</strong> <span id="modal-license"></span></p>
                            
                            <div class="details-section">
                                <h4>Motor</h4>
                                <p><strong>Engine Type:</strong> <span id="modal-engine"></span></p>
                                <p><strong>Displacement (cc):</strong> <span id="modal-displacement"></span> cc</p>
                                <p><strong>Bore X Stroke:</strong> <span id="modal-bore-stroke"></span> mm</p>
                                <p><strong>Compression Ratio:</strong> <span id="modal-compression-ratio"></span>:1</p>
                                <p><strong>Max Power:</strong> <span id="modal-max-power"></span>Kw</p>
                                <p><strong>Max Torque:</strong> <span id="modal-max-torque"></span>Nm</p>
                                <p><strong>Lubrication System:</strong> <span id="modal-lubrication"></span></p>
                                <p><strong>Clutch Type:</strong> <span id="modal-clutch"></span></p>
                                <p><strong>Ignition System:</strong> <span id="modal-ignition"></span></p>
                                <p><strong>Starting System:</strong> <span id="modal-starting"></span></p>
                                <p><strong>Transmission System:</strong> <span id="modal-transmission"></span></p>
                                <p><strong>Final Drive:</strong> <span id="modal-drive"></span></p>
                                <p><strong>Fuel Consumption:</strong> <span id="modal-fuel-consumption"></span>L /100 km</p>
                                <p><strong>CO2 Emissions:</strong> <span id="modal-co2"></span>g /100 km</p>
                                <p><strong>Fuel System:</strong> <span id="modal-fuel-system"></span></p>
                            </div>
                            
                            <div class="details-section">
                                <h4>Chassi</h4>
                                <p><strong>Frame:</strong> <span id="modal-frame"></span></p>
                                <p><strong>Rake Angle:</strong> <span id="modal-rake"></span></p>
                                <p><strong>Trail:</strong> <span id="modal-trail"></span> mm</p>
                                <p><strong>Front Suspension:</strong> <span id="modal-front-suspension"></span></p>
                                <p><strong>Rear Suspension:</strong> <span id="modal-rear-suspension"></span></p>
                                <p><strong>Front Travel:</strong> <span id="modal-front-travel"></span> mm</p>
                                <p><strong>Rear Travel:</strong> <span id="modal-rear-travel"></span> mm</p>
                                <p><strong>Front Brake:</strong> <span id="modal-front-brake"></span></p>
                                <p><strong>Rear Brake:</strong> <span id="modal-rear-brake"></span></p>
                                <p><strong>Front Tire:</strong> <span id="modal-front-tire"></span></p>
                                <p><strong>Rear Tire:</strong> <span id="modal-rear-tire"></span></p>
                            </div>
                            
                            <div class="details-section">
                                <h4>Dimensões</h4>
                                <p><strong>Total Length:</strong> <span id="modal-total-length"></span> mm</p>
                                <p><strong>Total Width:</strong> <span id="modal-total-width"></span> mm</p>
                                <p><strong>Total Height:</strong> <span id="modal-total-height"></span> mm</p>
                                <p><strong>Seat Height:</strong> <span id="modal-seat-height"></span> mm</p>
                                <p><strong>Wheelbase:</strong> <span id="modal-wheelbase"></span> mm</p>
                                <p><strong>Ground Clearance:</strong> <span id="modal-ground-clearance"></span> mm</p>
                                <p><strong>Weight:</strong> <span id="modal-weight"></span> kg</p>
                                <p><strong>Fuel Tank Capacity:</strong> <span id="modal-fuel-tank-capacity"></span> L</p>
                                <p><strong>Oil Tank Capacity:</strong> <span id="modal-oil-tank-capacity"></span> L</p>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- Modal for editing motorcycle -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
                <form id="editForm" action="{{ url('edit_motorcycle/__ID__') }}" method="POST" 
                enctype="multipart/form-data" class="edit-form">
                @csrf
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-left">
                        <div class="form-section">
                            <h3 class="section-title">Images</h3>
                    <div class="image-gallery" id="edit-image-gallery">

                    </div>
                            <div class="form-group" style="flex: 0 0 calc(100% - 20px); margin-top: 15px;">
                                <label class="form-label">Add New Photos</label>
                                <input type="file" name="photos[]" multiple class="form-control">
                                <span class="form-hint">Select Multiple Images (máx. 5MB). Accepted Format: JPG, PNG, GIF.</span>
                            </div>
                        </div>
                </div>
                <div class="modal-right">
                        <h3 class="section-title">Edit Motorcycle</h3>
                        
                        <div class="form-section">
                            <h4 class="section-title">Basic Information</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" id="edit-name" class="form-control" placeholder="Motorcycle Name">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Price (€)</label>
                                    <input type="number" step="0.01" name="price" id="edit-price" class="form-control" placeholder="Preço">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" min="0" step="1" name="quantity" id="edit-quantity" class="form-control" placeholder="Quantidade">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Brand</label>
                                    <select name="brand_id" class="form-control" id="edit-brand-select">
                                        <option value="">Selecione uma marca</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select name="Category" class="form-control" id="edit-category-select">
                                        <option value="">Selecione uma categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">License Type</label>
                                    <select name="license_type_id" class="form-control" id="edit-license-select">
                                        <option value="">Select License Type</option>
                                        @foreach($license_types as $type)
                                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group" style="flex: 0 0 calc(100% - 20px);">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="edit-description" class="form-control" placeholder="Descrição"></textarea>
                                </div>
                            </div>
                        </div>

                    <!-- Motor Section -->
                        <div class="form-section">
                            <h4 class="section-title">Motor</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Motor Type</label>
                                    <input type="text" name="engine_type" id="edit-engine-type" class="form-control" placeholder="Tipo de Motor">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Displacement (cc)</label>
                                    <input type="number" min="0" step="any" name="displacement" id="edit-displacement" class="form-control" placeholder="Cilindrada">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Bora x Stroke</label>
                                    <input type="text" name="bore_stroke" id="edit-bore-stroke" class="form-control" placeholder="Diâmetro x Curso">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Compression Ratio</label>
                                    <input type="number" step="any" name="compression_ratio" id="edit-compression-ratio" class="form-control" placeholder="Taxa de Compressão">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Max Power(cv)</label>
                                    <input type="number" step="any" name="max_power" id="edit-max-power" class="form-control" placeholder="Potência Máxima">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Max Torque (Nm)</label>
                                    <input type="number" step="any" name="max_torque" id="edit-max-torque" class="form-control" placeholder="Torque Máximo">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Lubrication System</label>
                                    <select name="lubrication_system_id" class="form-control" id="edit-lubrication-select">
                                        <option value="">Select System</option>
                                        @foreach($lubrication_systems as $system)
                                            <option value="{{ $system->id }}">{{ $system->system }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Clutch Type</label>
                                    <select name="clutch_type_id" class="form-control" id="edit-clutch-select">
                                        <option value="">Selecione o tipo</option>
                                        @foreach($clutch_types as $type)
                                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Ignition Type</label>
                                    <select name="ignition_system_id" class="form-control" id="edit-ignition-select">
                                        <option value="">Select System</option>
                                        @foreach($ignition_systems as $system)
                                            <option value="{{ $system->id }}">{{ $system->system }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Starting System</label>
                                    <select name="starting_system_id" class="form-control" id="edit-starting-select">
                                        <option value="">Select System</option>
                                        @foreach($starting_systems as $system)
                                            <option value="{{ $system->id }}">{{ $system->system }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Transmission System</label>
                                    <select name="transmission_system_id" class="form-control" id="edit-transmission-select">
                                        <option value="">Select System</option>
                                        @foreach($transmission_systems as $system)
                                            <option value="{{ $system->id }}">{{ $system->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Final Drive</label>
                                    <input type="text" name="final_drive" id="edit-drive" class="form-control" placeholder="Transmissão Final">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Fuel Consumption (L/100km)</label>
                                    <input type="number" step="any" name="fuel_consumption" id="edit-fuel-consumption" class="form-control" placeholder="Consumo de Combustível">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">CO2 Emissions (g/km)</label>
                                    <input type="number" step="any" name="cos2_emissions" id="edit-co2" class="form-control" placeholder="Emissões de CO2">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Fuel System</label>
                                    <input type="text" name="fuel_system" id="edit-fuel-system" class="form-control" placeholder="Sistema de Combustível">
                                </div>
                            </div>
                        </div>

                    <!-- Chassi Section -->
                        <div class="form-section">
                            <h4 class="section-title">Frame</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Frame Type</label>
                                    <input type="text" name="frame" id="edit-frame" class="form-control" placeholder="Tipo de Chassi">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Rake Angle (graus)</label>
                                    <input type="number" step="any" name="rake_angle" id="edit-rake" class="form-control" placeholder="Ângulo de Caster">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Trail (mm)</label>
                                    <input type="number" step="any" name="trail" id="edit-trail" class="form-control" placeholder="Trail">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Front Suspension</label>
                                    <select name="front_suspension_id" class="form-control" id="edit-front-suspension-select">
                                        <option value="">Selecione o tipo</option>
                                        @foreach($suspensions as $suspension)
                                            <option value="{{ $suspension->id }}">{{ $suspension->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label"></label>
                                    <select name="rear_suspension_id" class="form-control" id="edit-rear-suspension-select">
                                        <option value="">Select Type</option>
                                        @foreach($suspensions as $suspension)
                                            <option value="{{ $suspension->id }}">{{ $suspension->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Front Travel (mm)</label>
                                    <input type="number" step="any" name="front_travel" id="edit-front-travel" class="form-control" placeholder="Curso Dianteiro">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Rear Travel (mm)</label>
                                    <input type="number" step="any" name="rear_travel" id="edit-rear-travel" class="form-control" placeholder="Curso Traseiro">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Front Brake</label>
                                    <input type="text" name="front_brake" id="edit-front-brake" class="form-control" placeholder="Freio Dianteiro">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Rear Brake</label>
                                    <input type="text" name="rear_brake" id="edit-rear-brake" class="form-control" placeholder="Freio Traseiro">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Front Tire</label>
                                    <input type="text" name="front_tire" id="edit-front-tire" class="form-control" placeholder="Pneu Dianteiro">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Rear Tire</label>
                                    <input type="text" name="rear_tire" id="edit-rear-tire" class="form-control" placeholder="Pneu Traseiro">
                                </div>
                            </div>
                        </div>

                    <!-- Dimensões Section -->
                        <div class="form-section">
                            <h4 class="section-title">Dimensions</h4>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Total Length (mm)</label>
                                    <input type="number" step="any" name="total_length" id="edit-total-length" class="form-control" placeholder="Comprimento Total">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Total Width (mm)</label>
                                    <input type="number" step="any" name="total_width" id="edit-total-width" class="form-control" placeholder="Largura Total">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Total Height (mm)</label>
                                    <input type="number" step="any" name="total_height" id="edit-total-height" class="form-control" placeholder="Altura Total">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Seat Height (mm)</label>
                                    <input type="number" step="any" name="seat_height" id="edit-seat-height" class="form-control" placeholder="Altura do Assento">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Wheelbase (mm)</label>
                                    <input type="number" step="any" name="wheelbase" id="edit-wheelbase" class="form-control" placeholder="Distância Entre-Eixos">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Ground Clearance (mm)</label>
                                    <input type="number" step="any" name="ground_clearance" id="edit-ground-clearance" class="form-control" placeholder="Distância ao Solo">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Weight (kg)</label>
                                    <input type="number" step="any" name="weight" id="edit-weight" class="form-control" placeholder="Peso">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Fuel Tank Capacity (L)</label>
                                    <input type="number" step="any" name="fuel_tank_capacity" id="edit-fuel-tank-capacity" class="form-control" placeholder="Capacidade do Tanque">
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Oil Tank Capacity (L)</label>
                                    <input type="number" step="any" name="oil_tank_capacity" id="edit-oil-tank-capacity" class="form-control" placeholder="Capacidade de Óleo">
                                </div>
                            </div>
                        </div>

                        <div class="btn-container">
                            <button class="button-details" type="submit">Save</button>
                            <button class="button-details" type="button" onclick="closeEditModal()">Cancelar</button>
                        </div>
                </div>
            </form>
        </div>
    </div>

        <!-- Loading overlay -->
        <div id="loadingOverlay" class="loading-overlay">
            <div class="spinner"></div>
        </div>

                <script>
                    const motorcycles = @json($motorcycles);

                    function openModal(id) {
                        const motorcycle = motorcycles.find(m => m.id === id);
                        const modal = document.getElementById('modal');

                        // Moto em si
                        document.getElementById('modal-title').innerText = motorcycle.name;
                        document.getElementById('modal-description').innerText = motorcycle.description;
                        document.getElementById('modal-price').innerText = motorcycle.price;
                        document.getElementById('modal-brand').innerText = motorcycle.brand_id ? motorcycle.brand.brand_name : 'N/A';
                        document.getElementById('modal-license').innerText = motorcycle.license_type_id ? motorcycle.license_type.type : 'N/A';

                        // Motor
                        document.getElementById('modal-engine').innerText = motorcycle.engine_type || 'N/A';
                        document.getElementById('modal-displacement').innerText = motorcycle.displacement;
                        document.getElementById('modal-bore-stroke').innerText = motorcycle.bore_stroke;
                        document.getElementById('modal-compression-ratio').innerText = motorcycle.compression_ratio;
                        document.getElementById('modal-max-power').innerText = motorcycle.max_power;
                        document.getElementById('modal-max-torque').innerText = motorcycle.max_torque;
                        document.getElementById('modal-lubrication').innerText = motorcycle.lubrication_system_id ? motorcycle.lubrication_system.system : 'N/A';
                        document.getElementById('modal-clutch').innerText = motorcycle.clutch_type_id ? motorcycle.clutch_type.type : 'N/A';
                        document.getElementById('modal-ignition').innerText = motorcycle.ignition_system_id ? motorcycle.ignition_system.system : 'N/A';
                        document.getElementById('modal-starting').innerText = motorcycle.starting_system_id ? motorcycle.starting_system.system : 'N/A';
                        document.getElementById('modal-transmission').innerText = motorcycle.transmission_system_id ? motorcycle.transmission_system.type : 'N/A';
                        document.getElementById('modal-drive').innerText = motorcycle.final_drive;
                        document.getElementById('modal-fuel-consumption').innerText = motorcycle.fuel_consumption;
                        document.getElementById('modal-co2').innerText = motorcycle.cos2_emissions;
                        document.getElementById('modal-fuel-system').innerText = motorcycle.fuel_system;

                        //Chassi
                        document.getElementById('modal-frame').innerText = motorcycle.frame;
                        document.getElementById('modal-rake').innerText = motorcycle.rake_angle;
                        document.getElementById('modal-trail').innerText = motorcycle.trail;
                        document.getElementById('modal-rear-suspension').innerText = motorcycle.rear_suspension_id ? motorcycle.rear_suspension.type : 'N/A';
                        document.getElementById('modal-front-suspension').innerText = motorcycle.front_suspension_id ? motorcycle.front_suspension.type : 'N/A';
                        document.getElementById('modal-front-travel').innerText = motorcycle.front_travel;
                        document.getElementById('modal-rear-travel').innerText = motorcycle.rear_travel;
                        document.getElementById('modal-rear-brake').innerText = motorcycle.rear_brake;
                        document.getElementById('modal-front-brake').innerText = motorcycle.front_brake;
                        document.getElementById('modal-rear-tire').innerText = motorcycle.rear_tire;
                        document.getElementById('modal-front-tire').innerText = motorcycle.front_tire;

                        //dimensões
                        document.getElementById('modal-total-width').innerText = motorcycle.total_width;
                        document.getElementById('modal-total-length').innerText = motorcycle.total_length;
                        document.getElementById('modal-seat-height').innerText = motorcycle.seat_height;
                        document.getElementById('modal-total-height').innerText = motorcycle.total_height;
                        document.getElementById('modal-ground-clearance').innerText = motorcycle.ground_clearance;
                        document.getElementById('modal-wheelbase').innerText = motorcycle.wheelbase;
                        document.getElementById('modal-weight').innerText = motorcycle.weight;
                        document.getElementById('modal-fuel-tank-capacity').innerText = motorcycle.fuel_tank_capacity;
                        document.getElementById('modal-oil-tank-capacity').innerText = motorcycle.oil_tank_capacity;

                        const gallery = document.getElementById('image-gallery');
                        gallery.innerHTML = '';
                        motorcycle.photos.forEach((photo, index) => {
                            const img = document.createElement('img');
                            img.src = '{{ asset('motorcycles/') }}/' + photo.image;
                            img.alt = motorcycle.name;
                            img.className = index === 0 ? 'main-image' : 'gallery-image';
                            gallery.appendChild(img);
                        });

                        modal.style.display = "block";
                    }

                    function closeModal() {
                        const modal = document.getElementById('modal');
                        modal.style.display = "none";
                    }

                    window.onclick = function(event) {
                        const modal = document.getElementById('modal');
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

                    function deleteMotorcycle(id) {
                        window.location.href = "{{ url('delete_motorcycle') }}/" + id;
                    }

function closeEditModal() {
    const editModal = document.getElementById('editModal');
    const fileInput = document.querySelector('input[name="photos[]"]');
    const gallery = document.getElementById('edit-image-gallery');

    // Limpa o campo de upload de arquivos
    fileInput.value = '';

    // Limpa as imagens carregadas
    gallery.innerHTML = '';

    // Fecha o modal
    editModal.style.display = "none";
}

document.querySelector('input[name="photos[]"]').addEventListener('change', function(event) {
    const files = event.target.files;
    const gallery = document.getElementById('edit-image-gallery');
                
                // Remove a seção de novas imagens se já existir
                const existingNewSection = gallery.querySelector('.new-images-section');
                if (existingNewSection) {
                    existingNewSection.remove();
                }
                
                // Adiciona uma seção para as novas imagens
                const newImagesSection = document.createElement('div');
                newImagesSection.className = 'new-images-section';
                newImagesSection.innerHTML = '<h4 class="section-title">Novas Imagens</h4>';

    for (let i = 0; i < files.length; i++) {
                    const imgContainer = document.createElement('div');
                    imgContainer.className = 'image-container';
                    
        const img = document.createElement('img');
        img.src = URL.createObjectURL(files[i]);
        img.alt = 'Preview Image';
                    
                    imgContainer.appendChild(img);
                    newImagesSection.appendChild(imgContainer);
                }
                
                // Adiciona a seção de novas imagens ao topo da galeria
                if (gallery.firstChild) {
                    gallery.insertBefore(newImagesSection, gallery.firstChild);
                } else {
                    gallery.appendChild(newImagesSection);
    }
});

function openEditModal(id) {
    const motorcycle = motorcycles.find(m => m.id === id);
    const editModal = document.getElementById('editModal');
    const editForm = document.getElementById('editForm');

    // Preenche os campos do formulário
    document.getElementById('edit-name').value = motorcycle.name;
    document.getElementById('edit-description').value = motorcycle.description;
    document.getElementById('edit-price').value = motorcycle.price;
    document.getElementById('edit-quantity').value = motorcycle.quantity;
    
    // Marca, categoria e tipo de licença - preencher os IDs nos campos ocultos e os nomes nos campos de texto
    document.getElementById('edit-brand-select').value = motorcycle.brand_id;
    
    document.getElementById('edit-category-select').value = motorcycle.Category;
    
    document.getElementById('edit-license-select').value = motorcycle.license_type_id;

    // Motor Section
    document.getElementById('edit-engine-type').value = motorcycle.engine_type || '';
    document.getElementById('edit-displacement').value = motorcycle.displacement;
    document.getElementById('edit-bore-stroke').value = motorcycle.bore_stroke;
    document.getElementById('edit-compression-ratio').value = motorcycle.compression_ratio;
    document.getElementById('edit-max-power').value = motorcycle.max_power;
    document.getElementById('edit-max-torque').value = motorcycle.max_torque;
    
    // Sistemas - preencher os IDs nos campos ocultos e os nomes nos campos de texto
    document.getElementById('edit-lubrication-select').value = motorcycle.lubrication_system_id;
    
    document.getElementById('edit-clutch-select').value = motorcycle.clutch_type_id;
    
    document.getElementById('edit-ignition-select').value = motorcycle.ignition_system_id;
    
    document.getElementById('edit-starting-select').value = motorcycle.starting_system_id;
    
    document.getElementById('edit-transmission-select').value = motorcycle.transmission_system_id;
    
    document.getElementById('edit-drive').value = motorcycle.final_drive;
    document.getElementById('edit-fuel-consumption').value = motorcycle.fuel_consumption;
    document.getElementById('edit-co2').value = motorcycle.cos2_emissions;
    document.getElementById('edit-fuel-system').value = motorcycle.fuel_system;

    // Chassi Section
    document.getElementById('edit-frame').value = motorcycle.frame;
    document.getElementById('edit-rake').value = motorcycle.rake_angle;
    document.getElementById('edit-trail').value = motorcycle.trail;
    
    // Suspensões - preencher os selects
    document.getElementById('edit-front-suspension-select').value = motorcycle.front_suspension_id;
    document.getElementById('edit-rear-suspension-select').value = motorcycle.rear_suspension_id;
    
    document.getElementById('edit-front-travel').value = motorcycle.front_travel;
    document.getElementById('edit-rear-travel').value = motorcycle.rear_travel;
    document.getElementById('edit-front-brake').value = motorcycle.front_brake;
    document.getElementById('edit-rear-brake').value = motorcycle.rear_brake;
    document.getElementById('edit-front-tire').value = motorcycle.front_tire;
    document.getElementById('edit-rear-tire').value = motorcycle.rear_tire;

    // Dimensões Section
    document.getElementById('edit-total-length').value = motorcycle.total_length;
    document.getElementById('edit-total-width').value = motorcycle.total_width;
    document.getElementById('edit-total-height').value = motorcycle.total_height;
    document.getElementById('edit-seat-height').value = motorcycle.seat_height;
    document.getElementById('edit-wheelbase').value = motorcycle.wheelbase;
    document.getElementById('edit-ground-clearance').value = motorcycle.ground_clearance;
    document.getElementById('edit-weight').value = motorcycle.weight;
    document.getElementById('edit-fuel-tank-capacity').value = motorcycle.fuel_tank_capacity;
    document.getElementById('edit-oil-tank-capacity').value = motorcycle.oil_tank_capacity;

    // Atualiza o action do formulário com o ID correto
    editForm.action = "{{ url('edit_motorcycle/__ID__') }}".replace('__ID__', id);

    // Atualiza o campo oculto com o ID da moto
    document.querySelector('input[name="id"]').value = id;

    // Preenche as imagens
    const gallery = document.getElementById('edit-image-gallery');
    gallery.innerHTML = '';
                
    if (motorcycle.photos && motorcycle.photos.length > 0) {
        const currentImagesSection = document.createElement('div');
        currentImagesSection.className = 'current-images-section';
        currentImagesSection.innerHTML = '<h4 class="section-title">Imagens Atuais</h4>';
        
        motorcycle.photos.forEach((photo, index) => {
            const imgContainer = document.createElement('div');
            imgContainer.className = 'image-container';

            const img = document.createElement('img');
            img.src = '{{ asset('motorcycles/') }}/' + photo.image;
            img.alt = motorcycle.name;

            const deleteButton = document.createElement('button');
            deleteButton.innerText = 'X';
            deleteButton.className = 'delete-button';
                        deleteButton.onclick = (e) => {
                            e.preventDefault();
                            if (confirm('Tem certeza que deseja excluir esta imagem?')) {
                                deletePhoto(photo.id, imgContainer);
                            }
                        };

            imgContainer.appendChild(img);
            imgContainer.appendChild(deleteButton);
                        currentImagesSection.appendChild(imgContainer);
                    });
                    
                    gallery.appendChild(currentImagesSection);
                } else {
                    gallery.innerHTML = '<p style="text-align: center; color: #aaa; padding: 20px;">Nenhuma imagem disponível</p>';
                }

                // Mostra o modal
    editModal.style.display = "block";
                
                // Força o layout a ser renderizado corretamente
                const modalContent = document.querySelector('#editModal .modal-content');
                
                // Verifica o tamanho da tela e aplica o layout apropriado
                if (window.innerWidth <= 768) {
                    modalContent.style.flexDirection = 'column';
                } else {
                    modalContent.style.flexDirection = 'row';
                }
                
                // Adiciona um listener para redimensionamento da janela
                window.addEventListener('resize', function() {
                    if (editModal.style.display === "block") {
                        if (window.innerWidth <= 768) {
                            modalContent.style.flexDirection = 'column';
                        } else {
                            modalContent.style.flexDirection = 'row';
                        }
                    }
                });
            }

            function deletePhoto(photoId, container) {
    fetch(`${window.location.origin}/delete_photo/${photoId}`, { 
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        }
                })
                .then(response => {
                    if (response.ok) {
                        // Adiciona efeito de fade out antes de remover
                        container.style.transition = 'opacity 0.5s';
                        container.style.opacity = '0';
                        
                        // Remove o container após a animação
                        setTimeout(() => {
                            container.remove();
                            
                            // Verifica se ainda existem imagens na seção
                            const section = document.querySelector('.current-images-section');
                            if (section && !section.querySelector('.image-container')) {
                                section.innerHTML = '<p>Todas as imagens foram removidas</p>';
                            }
                        }, 500);
                        
                        // Mostra mensagem de sucesso
                        const message = document.createElement('div');
                        message.textContent = 'Imagem excluída com sucesso!';
                        message.style.backgroundColor = '#4CAF50';
                        message.style.color = 'white';
                        message.style.padding = '10px';
                        message.style.borderRadius = '5px';
                        message.style.marginBottom = '10px';
                        message.style.textAlign = 'center';
                        
                        const gallery = document.getElementById('edit-image-gallery');
                        gallery.insertBefore(message, gallery.firstChild);
                        
                        // Remove a mensagem após 3 segundos
                        setTimeout(() => {
                            message.style.opacity = '0';
                            message.style.transition = 'opacity 0.5s';
                            setTimeout(() => message.remove(), 500);
                        }, 3000);
                    } else {
                        alert('Erro ao excluir a imagem. Tente novamente.');
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Erro ao excluir a imagem. Tente novamente.');
    });
}

document.getElementById('editForm').addEventListener('submit', function(event) {
    // Não previne o comportamento padrão do formulário
    // Deixa o formulário ser enviado normalmente
    
    // Mostra o overlay de carregamento
    const loadingOverlay = document.getElementById('loadingOverlay');
    loadingOverlay.classList.add('active');
    
    // Adiciona um feedback visual de que o formulário está sendo enviado
    const submitButton = this.querySelector('button[type="submit"]');
    const originalText = submitButton.innerText;
    submitButton.innerText = 'Salvando...';
    submitButton.disabled = true;
    
    // Permite que o formulário seja enviado normalmente
    return true;
});

document.getElementById('search').addEventListener('input', function() {
    searchMotorcycle();
});

function searchMotorcycle() {
    let input = document.getElementById('search').value.toLowerCase();
    let cards = document.querySelectorAll('.card');
    
    cards.forEach(card => {
        let brand = card.querySelector('p') ? card.querySelector('p').innerText.toLowerCase() : '';
        let name = card.querySelector('h3') ? card.querySelector('h3').innerText.toLowerCase() : '';
        
        if (brand.indexOf(input) === -1 && name.indexOf(input) === -1) {
            card.style.display = 'none';
        } else {
            card.style.display = '';
        }
    });

    if (input === '') {
        cards.forEach(card => card.style.display = '');
    }
}
                </script>

                @include('admin.js')
    </div>
</body>
</html>