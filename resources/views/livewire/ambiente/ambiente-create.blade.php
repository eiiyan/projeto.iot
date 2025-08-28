<div>
    <div>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg p-4 text-primary-emphasis bg-white" style="width: 400px; border-radius: 20px">

            <div class="card-head input-group  justify-content-center">
                
                <h4 class="text-center mb-4 mt-4; center">Cadastrar Ambiente</strong>
                </h4>
            </div>


            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form wire:submit="store">
                <div class="mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" wire:model="nome" class="form-control rounded-pill"
                        placeholder="Digite o nome">

                    @error('nome')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" wire:model="descricao" class="form-control rounded-pill"
                        placeholder="Digite a descrição">
                    @error('descricao')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                            <label for="status">Status</label>
                            <select class="form-select rounded-pill" wire:model.defer="status" id="status">
                                <option selected>Selecione o Status</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                               
                              </select>
                            @error('serie_atual')
                                <span class="text-light small">{{ $message }}</span>
                            @enderror
                        </div>
               

                <div class="text-center">
                    <button type="submit" class="btn rounded-pill col-md-5 "
                        style="background-color: #04bbdf ; color:white" wire:loading.attr="disabled">
                        <strong><span>Cadastrar</span></strong>
                    </button>
                    <a href="{{ route('ambientes.index') }}" class="btn btn-danger rounded-pill text-light col-md-4">
                        <b>Fechar<b></a>
                </div>

            </form>

        </div>
    </div>

</div>
</div>
