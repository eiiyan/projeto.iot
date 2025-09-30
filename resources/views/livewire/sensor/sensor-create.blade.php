<div>
    <div>
    <div>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg p-4 text-primary-emphasis bg-white" style="width: 400px; border-radius: 20px">

            <div class="card-head input-group  justify-content-center">
                
                <h4 class="text-center mb-4 mt-4; center">Cadastrar Sensor</strong>
                </h4>
            </div>


            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form wire:submit="store">

                 <div class="mb-3">
                            <label for="ambiente">Ambiente</label>
                            <select class="form-select rounded-pill" wire:model.defer="ambiente" id="ambiente">
                                <option selected>Selecione o Ambiente</option>
                                @foreach ($ambientes as $ambiente)
                                <option value={{ $ambiente->id}}> {{$ambiente->nome}}</option>
                               @endforeach
                              </select>
                            @error('ambiente')
                                <span class="text-light small">{{ $message }}</span>
                            @enderror
                        </div>

                <div class="mb-3">
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" wire:model="codigo" class="form-control rounded-pill"
                        placeholder="Digite o código">

                    @error('codigo')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="tipo">Tipo</label>
                    <input type="text" id="tipo" wire:model="tipo" class="form-control rounded-pill"
                        placeholder="Digite o tipo">
                    @error('tipo')
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
                            @error('status')
                                <span class="text-light small">{{ $message }}</span>
                            @enderror
                        </div>
               

                <div class="text-center">
                    <button type="submit" class="btn rounded-pill col-md-5 "
                        style="background-color: #04bbdf ; color:white" wire:loading.attr="disabled">
                        <strong><span>Cadastrar</span></strong>
                    </button>
                    <a href="{{ route('sensores.index') }}" class="btn btn-danger rounded-pill text-light col-md-4">
                        <b>Fechar<b></a>
                </div>

            </form>

        </div>
    </div>

</div>
</div>

</div>
