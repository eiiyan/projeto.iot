<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            
        </div>

    </div>


    <div class="row mb-3">
        <div class="col-md-3">
            <div class="input-group align-items-center p-1 bg-body-tertiary rounded-pill">
                <input type="search" wire:model.debounce.300ms="search" class="form-control float-end mx-2 bg-transparent border border-0"
                    style="widht: 230px" placeholder="Buscar ambientes..." wire:model.live="search">
                    <i class="bi bi-search text-secondary p-1" id="toggleIcon"></i>
            </div>
        </div>


        <div class="col-md-9 text-end ">
            <a href="{{ route('ambientes.create') }}" class="btn btn-warning" style="color: white">
                <strong><i class="bi bi-plus-circle"></i> Novo Ambiente</strong>
            </a>
        </div>
    </div>

    <div class="card bg-warning">
        <div class="card-body">
            <div class="row mb-3">

            </div>

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-dismissible alert-success fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('message'))
                <div class="alert alert-dismissible alert-success fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif



            <div class="table-resposive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            
                        </tr>

                    </thead>
                    <tbody>
                        @forelse ($ambientes as $ambientes)
                            <tr>
                                <td>{{ $ambiente->nome }}</td>
                                <td>{{ $ambiente->descricao }}</td>
                                <td>{{ $ambiente->status }}</td>
                                <td>

                                    <a href="{{ route('ambientes.edit', $ambiente->id) }}"
                                        class="btn btn-sm btn-warning rounded-pill" style="color: white">
                                        <strong>
                                            <h7>Editar</h7>
                                        </strong>
                                    </a>
                                    <button wire:click="delete({{ $ambiente->id }})"
                                        class="btn btn-sm btn-danger rounded-pill "style="color: white"
                                        onclick="return confirm('Tem certeza?')">
                                        <strong>
                                            <h7>Deletar</h7>
                                        </strong>
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhum ambiente encontrado</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
            <div class="mt-3">
                {{ $ambientes->links() }}

            </div>
        </div>
    </div>
</div>
