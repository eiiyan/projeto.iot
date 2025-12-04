<div>
    <div>
        <div>
            <div class="d-flex align-items-center justify-content-center vh-100">
                <div class="card shadow-lg p-4 text-primary-emphasis bg-white"
                    style="width: 400px; border-radius: 20px">

                    <div class="card-head input-group  justify-content-center">
                        <h4 class="text-center mb-4 mt-4; center">Cadastrar Usuário</strong>
                        </h4>
                    </div>


                    @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form wire:submit="store">
                        <div class="mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" wire:model="name" class="form-control rounded-pill"
                                placeholder="Digite o nome">

                            @error('nome')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" wire:model="email" class="form-control rounded-pill"
                                placeholder="Digite seu e-mail">
                            @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">Senha</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password"
                                    class="form-control rounded-start-pill" wire:model.defer="password"
                                    placeholder="Digite sua senha">
                                <button type="button" class="btn  btn-light rounded-end-pill"
                                    style="background-color:#d3d3d3" onclick="togglePassword()">
                                    <i class="bi bi-eye" id="toggleIcon"></i>
                                </button>

                            </div>
                            @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="text-center">
                            <button class="btn rounded-pill col-md-5 "
                                style="background-color: #04bbdf ; color:white" wire:loading.attr="disabled">
                                <strong>Cadastrar</strong>
                            </button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary rounded-pill text-light col-md-4">
                                <b>Fechar<b></a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>