<div>
     <div class="mt-5 pt-5">

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mx-auto col-md-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br>

    <div class="card  col-sm-8 col-md-3 mx-auto rounded-4 shadow">
        <div class="card-body px-4 py-5">
            <div class="d-flex justify-content-center mb-4">
              <b><h3 class="text-center mb-4 mt-4; center" style="color: #01356d">Login</b>
                </h3>
            </div>

            <form wire:submit="login">
                <div class="mb-3">
                    <label for="email" class="text-light fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text rounded-start-pill"><i class="bi bi-person-circle"></i></span>
                        <input type="text" id="email" wire:model="email" placeholder="Digite seu e-mail"
                            class="form-control rounded-end-pill" />
                    </div>
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="text-light fw-semibold">Senha</label>
                    <div class="input-group">
                        <span class="input-group-text rounded-start-pill"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" id="password" wire:model="password" placeholder="Digite sua senha"
                            class="form-control rounded-end-pill" />
                    </div>
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn rounded-pill col-8 col-md-6 text-light" style="background-color: #01356d">
                        <strong><i class="bi bi-box-arrow-right"></i> Entrar</strong>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
