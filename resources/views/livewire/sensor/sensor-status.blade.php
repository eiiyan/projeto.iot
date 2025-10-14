<div>
    <div class="container mt-4">

        <div class="row mb-3">
            <div class="col-12">
                <strong>
                    <h2><i class="bi bi-phone-vibrate"></i> Sensores</h2>
                </strong>
            </div>
        </div>

        <div class="row mb-3 d-flex align-items-center justify-content-between">

            <div class="col-md-4 col-sm-12">
                <div class="input-group align-items-center p-1 bg-body-tertiary rounded-pill">
                    <input type="search" wire:model.debounce.300ms="search"
                        class="form-control float-end mx-2 bg-transparent border border-0"
                        placeholder="Buscar sensores..." wire:model.live="search">
                    <i class="bi bi-search text-secondary p-1" id="toggleIcon"></i>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mt-3 mt-md-0">
                <select wire:model.live="perPage" class="form-select border border-primary rounded shadow"
                    style="color:black">
                    <option value="15">15 por página</option>
                    <option value="25">25 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>

            <div class="col-md-5 col-sm-6 text-end mt-3 mt-md-0">
                <a href="{{ route('sensores.create') }}" class="btn btn-primary text-light rounded-pill">
                    <strong><i class="bi bi-plus-circle"></i> Novo Sensor</strong>
                </a>
            </div>
        </div>
        <br>
        <div class="card bg-primary">
            <div class="card-body" style="background-color: #04bbdf">

                @if (session()->has('message'))
                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (session()->has('notUpdate'))
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

                                <th>Código</th>
                                <th>Tipo</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sensores as $sensor)
                            <tr>

                                <td>{{ $sensor->codigo }}</td>
                                <td>{{ $sensor->tipo }}</td>


                                <td class="align-middle">
                                    <div class="d-flex align-items-center">

                                        <span
                                            class="{{ $sensor->status == 0 ? 'text-danger fw-bold' : 'text-secondary' }} me-2">
                                            INATIVO
                                        </span>

                                        <div class="form-check form-switch m-0">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="switchCheckChecked_{{ $sensor->id }}"
                                                wire:click="toggleStatus({{ $sensor->id }})" {{ $sensor->status == 1 ?
                                            'checked' : '' }}>
                                            <label class="form-check-label visually-hidden"
                                                for="switchCheckChecked_{{ $sensor->id }}">Toggle Status</label>
                                        </div>
                                       <span
                                            class="{{ $sensor->status == 1 ? 'text-primary fw-bold' : 'text-secondary' }} ms-2">
                                            ATIVO
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Nenhum sensor encontrado.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">

                    @if(isset($sensores) && method_exists($sensores, 'links'))

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>