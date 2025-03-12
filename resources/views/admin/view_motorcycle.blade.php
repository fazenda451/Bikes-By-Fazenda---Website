<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.css')

    <style type="text/css">

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            background: #2a2a2a;
            border: 1px solid #444;
            border-radius: 8px;
            padding: 15px;
            margin: 10px;
            width: calc(30% - 20px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .card {
            width: calc(50% - 20px); /* 2 cards por linha em telas médias */
            }
        }

        @media (max-width: 480px) {
            .card {
            width: calc(100% - 20px); /* 1 card por linha em telas pequenas */
        }
    }

        .moto-image {
            width: 100%;
            object-fit: cover;
            border-radius: 5px;
            height: 100%;
}



        .button-details {
            background-color: #9709e9;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .button-details :hover {
            background-color: #9709e9;
            transform: translateY(-2px);
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
            box-shadow: 0 8px 20px rgba( 0, 0, 0, 0.4);
        }

        .modal-left {
            width: 40%;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .modal-right {
            width: 60%;
            padding: 10px;
            color: white
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
            gap: 10px;
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
        margin-bottom: 10px;
}

.delete-button {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: red;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
}

.delete-button:hover {
    background-color: darkred;
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


    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="search-container">
                    <input type="text" id="search" placeholder="Search Motorcycle..." />
                </div>
                <div class="card-container">
                    @foreach ($motorcycles as $motorcycle)
                        <div class="card">
                            @if($motorcycle->photos->isNotEmpty())
                                <img src="{{ asset('motorcycles/' . $motorcycle->photos->first()->image) }}" alt="{{ $motorcycle->name }}" class="moto-image">
                            @else
                                <img src="{{ asset('default-image.jpg') }}" alt="Default Image" class="moto-image">
                            @endif
                            <h3>{{ $motorcycle->name }}</h3>
                            <p>Brand: {{ $motorcycle->brand->brand_name }}</p>
                            <button class="button-details" onclick="openModal({{ $motorcycle->id }})">Details</button>
                            <button class="button-details" onclick="openEditModal({{ $motorcycle->id }})">Edit</button>
                            <button class="button-details" onclick="deleteMotorcycle({{ $motorcycle->id }})">Delete</button>
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
            <form id="editForm" action="{{ route('update_motorcycle', ['id' => '__ID__']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="edit-id">
                <div class="modal-left">
                    <div class="image-gallery" id="edit-image-gallery">
                        <!-- Images will be loaded here -->
                    </div>
                    <input type="file" name="photos[]" multiple>
                </div>
                <div class="modal-right">
                    <h3>Edit Motorcycle</h3>
                    <input type="text" name="name" id="edit-name" placeholder="Motorcycle Name">
                    <input type="text" name="description" id="edit-description" placeholder="Description">
                    <input type="number" name="price" id="edit-price" placeholder="Price">
                    <input type="text" name="brand_id" id="edit-brand" placeholder="Brand ID">
                    <input type="text" name="license_type_id" id="edit-license" placeholder="License Type ID">

                    <!-- Motor Section -->
                    <h4>Motor</h4>
                    <input type="text" name="engine_type_id" id="edit-engine" placeholder="Engine Type ID">
                    <input type="number" name="displacement" id="edit-displacement" placeholder="Displacement (cc)">
                    <input type="text" name="bore_stroke" id="edit-bore-stroke" placeholder="Bore X Stroke">
                    <input type="text" name="compression_ratio" id="edit-compression-ratio" placeholder="Compression Ratio">
                    <input type="text" name="max_power" id="edit-max-power" placeholder="Max Power">
                    <input type="text" name="max_torque" id="edit-max-torque" placeholder="Max Torque">
                    <input type="text" name="lubrication_system_id" id="edit-lubrication" placeholder="Lubrication System ID">
                    <input type="text" name="clutch_type_id" id="edit-clutch" placeholder="Clutch Type ID">
                    <input type="text" name="ignition_system_id" id="edit-ignition" placeholder="Ignition System ID">
                    <input type="text" name="starting_system_id" id="edit-starting" placeholder="Starting System ID">
                    <input type="text" name="transmission_system_id" id="edit-transmission" placeholder="Transmission System ID">
                    <input type="text" name="final_drive" id="edit-drive" placeholder="Final Drive">
                    <input type="number" name="fuel_consumption" id="edit-fuel-consumption" placeholder="Fuel Consumption">
                    <input type="number" name="cos2_emissions" id="edit-co2" placeholder="CO2 Emissions">
                    <input type="text" name="fuel_system" id="edit-fuel-system" placeholder="Fuel System">

                    <!-- Chassi Section -->
                    <h4>Chassi</h4>
                    <input type="text" name="frame" id="edit-frame" placeholder="Frame">
                    <input type="text" name="rake_angle" id="edit-rake" placeholder="Rake Angle">
                    <input type="number" name="trail" id="edit-trail" placeholder="Trail">
                    <input type="text" name="front_suspension_id" id="edit-front-suspension" placeholder="Front Suspension ID">
                    <input type="text" name="rear_suspension_id" id="edit-rear-suspension" placeholder="Rear Suspension ID">
                    <input type="number" name="front_travel" id="edit-front-travel" placeholder="Front Travel">
                    <input type="number" name="rear_travel" id="edit-rear-travel" placeholder="Rear Travel">
                    <input type="text" name="front_brake" id="edit-front-brake" placeholder="Front Brake">
                    <input type="text" name="rear_brake" id="edit-rear-brake" placeholder="Rear Brake">
                    <input type="text" name="front_tire" id="edit-front-tire" placeholder="Front Tire">
                    <input type="text" name="rear_tire" id="edit-rear-tire" placeholder="Rear Tire">

                    <!-- Dimensões Section -->
                    <h4>Dimensões</h4>
                    <input type="number" name="total_length" id="edit-total-length" placeholder="Total Length">
                    <input type="number" name="total_width" id="edit-total-width" placeholder="Total Width">
                    <input type="number" name="total_height" id="edit-total-height" placeholder="Total Height">
                    <input type="number" name="seat_height" id="edit-seat-height" placeholder="Seat Height">
                    <input type="number" name="wheelbase" id="edit-wheelbase" placeholder="Wheelbase">
                    <input type="number" name="ground_clearance" id="edit-ground-clearance" placeholder="Ground Clearance">
                    <input type="number" name="weight" id="edit-weight" placeholder="Weight">
                    <input type="number" name="fuel_tank_capacity" id="edit-fuel-tank-capacity" placeholder="Fuel Tank Capacity">
                    <input type="number" name="oil_tank_capacity" id="edit-oil-tank-capacity" placeholder="Oil Tank Capacity">

                    <button class="button-details" type="submit">Save Changes</button>
                    <button class="button-details" type="button" onclick="closeEditModal()">Cancel</button>
                </div>
            </form>
        </div>
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
                        
                        document.getElementById('modal-engine').innerText = motorcycle.engine_type_id ? motorcycle.engine_type.type : 'N/A';
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


                    //Edição


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
    gallery.innerHTML = '';

    for (let i = 0; i < files.length; i++) {
        const img = document.createElement('img');
        img.src = URL.createObjectURL(files[i]);
        img.alt = 'Preview Image';
        img.className = 'gallery-image';
        gallery.appendChild(img);
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
    document.getElementById('edit-brand').value = motorcycle.brand_id;
    document.getElementById('edit-license').value = motorcycle.license_type_id;

    // Motor Section
    document.getElementById('edit-engine').value = motorcycle.engine_type_id;
    document.getElementById('edit-displacement').value = motorcycle.displacement;
    document.getElementById('edit-bore-stroke').value = motorcycle.bore_stroke;
    document.getElementById('edit-compression-ratio').value = motorcycle.compression_ratio;
    document.getElementById('edit-max-power').value = motorcycle.max_power;
    document.getElementById('edit-max-torque').value = motorcycle.max_torque;
    document.getElementById('edit-lubrication').value = motorcycle.lubrication_system_id;
    document.getElementById('edit-clutch').value = motorcycle.clutch_type_id;
    document.getElementById('edit-ignition').value = motorcycle.ignition_system_id;
    document.getElementById('edit-starting').value = motorcycle.starting_system_id;
    document.getElementById('edit-transmission').value = motorcycle.transmission_system_id;
    document.getElementById('edit-drive').value = motorcycle.final_drive;
    document.getElementById('edit-fuel-consumption').value = motorcycle.fuel_consumption;
    document.getElementById('edit-co2').value = motorcycle.cos2_emissions;
    document.getElementById('edit-fuel-system').value = motorcycle.fuel_system;

    // Chassi Section
    document.getElementById('edit-frame').value = motorcycle.frame;
    document.getElementById('edit-rake').value = motorcycle.rake_angle;
    document.getElementById('edit-trail').value = motorcycle.trail;
    document.getElementById('edit-front-suspension').value = motorcycle.front_suspension_id;
    document.getElementById('edit-rear-suspension').value = motorcycle.rear_suspension_id;
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
    editForm.action = "{{ route('update_motorcycle', ['id' => '__ID__']) }}".replace('__ID__', id);

    // Atualiza o campo oculto com o ID da moto
    document.querySelector('input[name="id"]').value = id;

    // Preenche as imagens
    const gallery = document.getElementById('edit-image-gallery');
    gallery.innerHTML = '';
    motorcycle.photos.forEach((photo, index) => {
        const imgContainer = document.createElement('div');
        imgContainer.className = 'image-container';

        const img = document.createElement('img');
        img.src = '{{ asset('motorcycles/') }}/' + photo.image;
        img.alt = motorcycle.name;
        img.className = index === 0 ? 'main-image' : 'gallery-image';

        const deleteButton = document.createElement('button');
        deleteButton.innerText = 'X';
        deleteButton.className = 'delete-button';
        deleteButton.onclick = () => deletePhoto(photo.id); // Função para apagar a foto

        imgContainer.appendChild(img);
        imgContainer.appendChild(deleteButton);
        gallery.appendChild(imgContainer);
    });

    editModal.style.display = "block";
}

function deletePhoto(photoId) {
    fetch(`${window.location.origin}/delete_photo/${photoId}`, { 
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        }
    });
}

document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault();
    console.log('Displacement:', document.getElementById('edit-displacement').value);
    this.submit();
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
        </div>
    </div>
</body>
</html>