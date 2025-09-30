<div>
   <div class="container mt-4">
    
    <div class="row mb-3">
        <div class="col-md-6">
            <strong><h2><i class="bi bi-collection-fill"></i> Registros</strong></h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="input-group align-items-center p-1 bg-body-tertiary rounded-pill">
                <input type="search" wire:model.debounce.300ms="search" class="form-control float-end mx-2 bg-transparent border border-0"
                    style="widht: 230px" placeholder="Buscar registros..." wire:model.live="search">
                    <i class="bi bi-search text-secondary p-1" id="toggleIcon"></i>
            </div>
        </div>

        
                            <div class="col-md-3 mt-1">
                                <select wire:model.live="perPage" class="form-select" wire:model.live="search">
                                    <option value="15">15 por página</option>
                                    <option value="25">25 por página</option>
                                    <option value="50">50 por página</option>
                                    <option value="100">100 por página</option>
                                </select>
                            </div>
                <br>

    </div>
    
    <div class="card bg-primary">
        
        <div class="card-body" style="background-color: #04bbdf">

            @if(session()->has('message'))
                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has('notUpdate'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sensor_ID</th>
                            <th>Valor</th>
                            <th>Unidade</th>
                            <th>Data e Hora</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registros as $registro)
                            <tr>
                                <td>{{ $registro->id }}</td>
                                <td>{{ $registro->sensor_id}}</td>
                                <td>{{ $registro->valor }}</td>
                                <td>{{ $registro->unidade }}</td>
                                <td>{{ $registro->data_hora }}</td>
                                
                                <td>
            

                                    <button wire:click="delete({{ $registro->id }})" 
                                    class="btn btn-sm btn-primary text-light rounded-pill" onclick="return confirm('Tem certeza?')" style="background-color: #01356d">
                                        <strong>Deletar</strong>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Nenhum registro encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                
            </div>
        </div>
    </div>
</div>



