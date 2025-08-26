<div>
    <div>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg p-4 bg-warning text-light" style="width: 400px; border-radius: 20px">

            <div class="card-head input-group">
                
                <h4 class="text-center mb-4 mt-4">Cadastrar Ambiente</strong>
                </h4>
            </div>


            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form wire:submit="salvar">
                <div class="mb-3">
                    <b> <label for="nome" class="text-light">Nome</label></b>
                    <input type="text" id="nome" wire:model="nome" class="form-control rounded-pill"
                        placeholder="Digite seu nome">

                    @error('nome')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <b> <label for="descricao" class="text-light">Descrição</label></b>
                    <input type="text" id="cpf" wire:model="descricao" class="form-control rounded-pill"
                        placeholder="Digite sua descrição">
                    @error('cpf')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                            <label for="status" class="text-light"><strong>Status</strong></label>
                            <select class="form-select rounded-pill" wire:model.defer="serie_atual" id="serie_atual">
                                <option selected>Selecione o Status</option>
                                <option value="Ativo">Ativo</option>
                                <option value="Inativo">Inativo</option>
                               
                              </select>
                            @error('serie_atual')
                                <span class="text-light small">{{ $message }}</span>
                            @enderror
                        </div>
               

                <div class="text-center">
                    <button type="submit" class="btn rounded-pill col-md-5 "
                        style="background-color:#D9931C ; color:white" wire:loading.attr="disabled">
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
