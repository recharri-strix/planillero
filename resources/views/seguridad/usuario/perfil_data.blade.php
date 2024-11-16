    <div class="row">
        @if (!isset($readonly))
            @php($readonly = false)
        @endif

        <div class="container-xl px-4">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Detalle de usuario</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.save') }}" accept-charset="UTF-8">
                                @csrf
                                <input type="hidden" name="id" value="{{ old('user_id', $user->id) }}" />
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="name">Nombre y apellido</label>
                                        <input class="form-control" id="name" name="name" type="text"
                                            placeholder="Ingrese su nombre y apellido"
                                            value="{{ old('name', $user->name) }}" />
                                    </div>
                                    <div class="col-md-5">
                                        <label class="small mb-1" for="telefono">Telefono</label>
                                        <input class="form-control" id="telefono" name="telefono" type="tel"
                                            placeholder="Ingrese nro de telefono"
                                            value="{{ old('telefono', $user->telefono) }}" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="dni">Dni</label>
                                        <input class="form-control" id="dni" name="dni" type="tel"
                                            placeholder="Ingrese nro de dni" value="{{ old('dni', $user->dni) }}" />
                                    </div>
                                    <div class="col-md-9">
                                        <label class="small mb-1" for="email">Email </label>
                                        <input class="form-control" id="email" name="email" type="email"
                                            placeholder="Ingrese su email" value="{{ old('email', $user->email) }}" />
                                    </div>
                                </div>
                                <!-- Form Row-->

                                <!-- Save changes button-->
                                <button class="btn btn-primary mt-4" type="submit">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $("a").removeClass("active  ms-0");
            $("#perfil").addClass("active  ms-0");

            if ({{ isset($readonly) ? true : false }}) {
                var formulario = document.getElementById("formreadonly");
                var campos = formulario.getElementsByTagName("input");
                for (var i = 0; i < campos.length; i++) {
                    campos[i].readOnly = true;
                }
                var campos = formulario.getElementsByTagName("button");
                for (var i = 0; i < campos.length; i++) {
                    campos[i].style.display = "none";
                }

                document.getElementById("foto").disabled = true;
            }

        });
    </script>
