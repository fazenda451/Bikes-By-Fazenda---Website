<!DOCTYPE html>
<html lang="pt">
<head> 
    @include('admin.css')
    <style type="text/css">
        .form-container {
            margin: 20px;
            background-color: #2d3035;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .page-title {
            color: #9935dc;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .form-section {
            background-color: #343a40;
            padding: 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #3d4148;
        }
        
        .section-title {
            color: #9935dc;
            font-size: 18px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #3d4148;
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }
        
        .form-group {
            flex: 0 0 calc(33.333% - 20px);
            margin: 0 10px 20px;
        }
        
        @media (max-width: 992px) {
            .form-group {
                flex: 0 0 calc(50% - 20px);
            }
        }
        
        @media (max-width: 768px) {
            .form-group {
                flex: 0 0 calc(100% - 20px);
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
        
        .form-hint {
            display: block;
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }
        
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        .btn {
            padding: 8px 20px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }
        
        .btn-primary {
            background-color: #9935dc;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #8024c0;
        }
        
        .btn-secondary {
            background-color: #3d4148;
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #4d5158;
        }
        
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.2);
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        
        .alert-danger ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        
        .alert-danger li {
            margin-bottom: 8px;
        }
        
        .image-preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        
        .image-preview {
            width: 80px;
            height: 80px;
            border-radius: 4px;
            object-fit: cover;
            border: 1px solid #3d4148;
        }
        
        .required-field::after {
            content: "*";
            color: #dc3545;
            margin-left: 4px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
              <h2 class="h5 no-margin-bottom">Add New Motorcycle</h2>
            </div>
          </div>
        <div class="container-fluid">
            

            <div class="form-container">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form action="{{ url('upload_motorcycle') }}" method="POST" enctype="multipart/form-data" id="motorcycleForm">
                    @csrf
                    
                    <!-- Informações Básicas -->
                    <div class="form-section">
                        <h3 class="section-title">Informações Básicas</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label required-field">Nome</label>
                                <input type="text" name="name" class="form-control" required>
                                <span class="form-hint">Nome completo da motocicleta</span>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Marca</label>
                                <select name="brand_id" class="form-control" required>
                                    <option value="">Selecione uma marca</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Categoria</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">Selecione uma categoria</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Preço (€)</label>
                                <input type="number" step="0.01" name="price" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Quantidade</label>
                                <input type="number" name="quantity" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Tipo de Licença</label>
                                <select name="license_type_id" class="form-control" required>
                                    <option value="">Selecione o tipo de licença</option>
                                    @foreach($license_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group" style="flex: 0 0 calc(100% - 20px);">
                                <label class="form-label required-field">Descrição</label>
                                <textarea name="description" class="form-control" required></textarea>
                                <span class="form-hint">Descrição detalhada da motocicleta</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Especificações do Motor -->
                    <div class="form-section">
                        <h3 class="section-title">Especificações do Motor</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label required-field">Tipo de Motor</label>
                                <select name="engine_type_id" class="form-control" required>
                                    <option value="">Selecione o tipo de motor</option>
                                    @foreach($engine_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Cilindrada (cc)</label>
                                <input type="text" name="displacement" class="form-control" required>
                                <span class="form-hint">Ex: 125, 250, 600, 1000</span>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Diâmetro x Curso</label>
                                <input type="text" name="bore_stroke" class="form-control" required>
                                <span class="form-hint">Ex: 67mm x 42.5mm</span>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Taxa de Compressão</label>
                                <input type="number" step="0.1" name="compression_ratio" class="form-control" required>
                                <span class="form-hint">Ex: 11.5:1 (digite apenas 11.5)</span>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Potência Máxima (cv)</label>
                                <input type="number" step="0.1" name="max_power" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Torque Máximo (Nm)</label>
                                <input type="number" step="0.1" name="max_torque" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Sistema de Lubrificação</label>
                                <select name="lubrication_system_id" class="form-control" required>
                                    <option value="">Selecione o sistema</option>
                                    @foreach($lubrication_systems as $system)
                                        <option value="{{ $system->id }}">{{ $system->system }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Tipo de Embreagem</label>
                                <select name="clutch_type_id" class="form-control" required>
                                    <option value="">Selecione o tipo</option>
                                    @foreach($clutch_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Sistema de Ignição</label>
                                <select name="ignition_system_id" class="form-control" required>
                                    <option value="">Selecione o sistema</option>
                                    @foreach($ignition_systems as $system)
                                        <option value="{{ $system->id }}">{{ $system->system }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Transmissão e Combustível -->
                    <div class="form-section">
                        <h3 class="section-title">Transmissão e Combustível</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label required-field">Sistema de Partida</label>
                                <select name="starting_system_id" class="form-control" required>
                                    <option value="">Selecione o sistema</option>
                                    @foreach($starting_systems as $system)
                                        <option value="{{ $system->id }}">{{ $system->system }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Sistema de Transmissão</label>
                                <select name="transmission_system_id" class="form-control" required>
                                    <option value="">Selecione o sistema</option>
                                    @foreach($transmission_systems as $system)
                                        <option value="{{ $system->id }}">{{ $system->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Transmissão Final</label>
                                <input type="text" name="final_drive" class="form-control" required>
                                <span class="form-hint">Ex: Corrente, Cardã, Correia</span>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Consumo de Combustível (L/100km)</label>
                                <input type="number" step="0.01" name="fuel_consumption" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Emissões de CO2 (g/km)</label>
                                <input type="number" step="0.01" name="cos2_emissions" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Sistema de Combustível</label>
                                <input type="text" name="fuel_system" class="form-control" required>
                                <span class="form-hint">Ex: Injeção Eletrônica, Carburador</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Chassi e Suspensão -->
                    <div class="form-section">
                        <h3 class="section-title">Chassi e Suspensão</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label required-field">Tipo de Chassi</label>
                                <input type="text" name="frame" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Ângulo de Caster (graus)</label>
                                <input type="number" step="0.1" name="rake_angle" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Trail (mm)</label>
                                <input type="text" name="trail" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Suspensão Dianteira</label>
                                <select name="front_suspension_id" class="form-control" required>
                                    <option value="">Selecione o tipo</option>
                                    @foreach($suspensions as $suspension)
                                        <option value="{{ $suspension->id }}">{{ $suspension->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Suspensão Traseira</label>
                                <select name="rear_suspension_id" class="form-control" required>
                                    <option value="">Selecione o tipo</option>
                                    @foreach($suspensions as $suspension)
                                        <option value="{{ $suspension->id }}">{{ $suspension->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Curso Dianteiro (mm)</label>
                                <input type="number" step="1" name="front_travel" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Curso Traseiro (mm)</label>
                                <input type="number" step="1" name="rear_travel" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Freios e Pneus -->
                    <div class="form-section">
                        <h3 class="section-title">Freios e Pneus</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label required-field">Freio Dianteiro</label>
                                <input type="text" name="front_brake" class="form-control" required>
                                <span class="form-hint">Ex: Disco duplo, 320mm, 4 pistões</span>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Freio Traseiro</label>
                                <input type="text" name="rear_brake" class="form-control" required>
                                <span class="form-hint">Ex: Disco simples, 240mm, 1 pistão</span>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Pneu Dianteiro</label>
                                <input type="text" name="front_tire" class="form-control" required>
                                <span class="form-hint">Ex: 120/70 ZR17</span>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Pneu Traseiro</label>
                                <input type="text" name="rear_tire" class="form-control" required>
                                <span class="form-hint">Ex: 180/55 ZR17</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dimensões -->
                    <div class="form-section">
                        <h3 class="section-title">Dimensões e Capacidades</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label required-field">Comprimento Total (mm)</label>
                                <input type="number" step="1" name="total_length" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Largura Total (mm)</label>
                                <input type="number" step="1" name="total_width" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Altura Total (mm)</label>
                                <input type="number" step="1" name="total_height" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Altura do Assento (mm)</label>
                                <input type="number" step="1" name="seat_height" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Distância Entre-Eixos (mm)</label>
                                <input type="number" step="1" name="wheelbase" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Distância ao Solo (mm)</label>
                                <input type="number" step="1" name="ground_clearance" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Peso (kg)</label>
                                <input type="number" step="0.1" name="weight" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Capacidade do Tanque (L)</label>
                                <input type="number" step="0.1" name="fuel_tank_capacity" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Capacidade de Óleo (L)</label>
                                <input type="number" step="0.1" name="oil_tank_capacity" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Imagens -->
                    <div class="form-section">
                        <h3 class="section-title">Imagens</h3>
                        <div class="form-row">
                            <div class="form-group" style="flex: 0 0 calc(100% - 20px);">
                                <label class="form-label required-field">Fotos da Moto</label>
                                <input type="file" name="images[]" id="motorcycle-images" class="form-control" multiple required>
                                <span class="form-hint">Selecione múltiplas imagens (máx. 5MB cada). Formatos aceitos: JPG, PNG, GIF.</span>
                                
                                <div class="image-preview-container" id="image-preview-container"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="btn-container">
                        <div>
                            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancelar</button>
                            <button type="button" class="btn btn-danger" onclick="document.getElementById('motorcycleForm').reset(); document.getElementById('image-preview-container').innerHTML = '';">Limpar</button>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar Moto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- JavaScript para preview de imagens e validação -->

    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Preview de imagens
            const imageInput = document.getElementById('motorcycle-images');
            const previewContainer = document.getElementById('image-preview-container');
            
            imageInput.addEventListener('change', function() {
                previewContainer.innerHTML = '';
                
                if (this.files) {
                    const filesAmount = this.files.length;
                    
                    for (let i = 0; i < filesAmount; i++) {
                        const reader = new FileReader();
                        
                        reader.onload = function(event) {
                            const img = document.createElement('img');
                            img.src = event.target.result;
                            img.classList.add('image-preview');
                            previewContainer.appendChild(img);
                        }
                        
                        reader.readAsDataURL(this.files[i]);
                    }
                }
            });
            
            // Função para limitar o comprimento dos inputs numéricos
            function limitLength(input, maxLength) {
                if (input.value.length > maxLength) {
                    input.value = input.value.slice(0, maxLength);
                }
            }
            
            // Aplicar a função a todos os inputs numéricos
            const numericInputs = document.querySelectorAll('input[type="number"]');
            numericInputs.forEach(input => {
                input.addEventListener('input', function() {
                    limitLength(this, 10);
                });
            });
        });
    </script>
</body>
</html>