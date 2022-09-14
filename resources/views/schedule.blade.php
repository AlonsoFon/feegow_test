<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

<!DOCTYPE html>
<html>
<head>
    <title>Feegow test</title>
   <!--Made with love by Mutiullah Samim -->
   
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Agende sua consulta</h3>
                </div>
                <div class="card-body" style="padding-left: 14px;padding-top: 0px;padding-right: 14px;">
                    <div class="row" style="background: #4e87ff;color: white;height: 60px">
                        <div class="col-lg-2" style="margin-top: 15px;">
                            <h4>Consulta de</h4>
                        </div>
                        <div class="col-lg-8" style="margin-top: 15px;">
                            <select id="especialidade_select" onchange="getProfessionalList()" class="form-select" aria-label="Default select example" style="height: 70%;width: 100%;border-radius: 15px;text-align: center;">
                                <option disabled="" selected>Selecione a especialidade</option>
                                @foreach($specialties_list as $key => $speciality)
                                    <option value="{{ $speciality->especialidade_id }}">{{ $speciality->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2" style="margin-top: 15px">
                            <button onclick="getProfessionalList()" type="button"class="btn float-right login_btn"> AGENDAR </button>
                        </div>
                    </div>
                    <div id="professional_list_div"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="alert_display" style="display: none;position: absolute;top: 0px;right: 0px;max-width: 50%" class="alert alert-dismissible fade show" role="alert">
        <span id="alert_display_text"> You should check in on some of those fields below.</span>
        <button onclick="closeAlert()" type="button" class="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- schedule consult modal start -->
    <div class="modal fade" id="requestConsultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Preencha seus dados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="consult">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nome completo">
                            <div id="invalid_name" class="invalid-feedback" style="display: none">
                                Por favor digite seu nome.
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Data de nascimento</label>
                            <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="Data de nascimento">
                            <div id="invalid_birth_date" class="invalid-feedback" style="display: none">
                                Por favor selecione uma data de nascimento válida.
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="source_id" id="source_id" class="form-select" aria-label="Default select example" style="height: 40px;width: 100%;text-align: center;">
                                    <option disabled="" selected value="">Como Conheceu?</option>
                                    @foreach($source_list as $key => $source)
                                        <option value="{{ $source->origem_id }}">{{ $source->nome_origem }}</option>
                                    @endforeach
                            </select>
                            <div id="invalid_source_id" class="invalid-feedback" style="display: none">
                                Por favor selecione uma opção.
                            </div>
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="123.456.789-00">
                            <div id="invalid_cpf" class="invalid-feedback" style="display: none">
                                Por favor preencha um CPF válido.
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button onclick="requestConsult()" style="background: #4dc64d;color: white" type="button" class="btn ">Solicitar Horários</button>
                </div>
            </div>
        </div>
    </div>
    <!-- schedule consult modal end -->
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $("#cpf").mask("000.000.000-00");
        var alert_display = document.getElementById("alert_display");
        var alert_display_text = document.getElementById("alert_display_text");
        var professional_list_div = document.getElementById("professional_list_div");
        var male_avatar = "{{ asset('images/avatar_male.png') }}";
        var female_avatar = "{{ asset('images/avatar_female.png') }}";

        var selected_profissional_id = 0;

        function alertChanged(alert_message,alert_show,alert_class){
            alert_display_text.innerHTML = alert_message;
            alert_display.style.display = alert_show;
            alert_display.classList.remove("alert-success");
            alert_display.classList.remove("alert-danger");
            if(alert_class != ""){
                alert_display.classList.add(alert_class);
            }
        }
        function closeAlert(){
            alertChanged("","none","");
        }
        function getProfessionalList(){
            var data = {};
            data.especialidade_id = document.getElementById("especialidade_select").value;
            $.ajax({
              url: '{{ route("professional.list") }}',
              data: data,
              method: 'GET'
            }).then(function(result){
                var element_innerHTML = "";
                professional_list_div.innerHTML = element_innerHTML;
                var view_width = $(window).width();
                if(result == "failed"){
                    alertChanged("Opps! Algo de errado esta acontecendo com o servidor, tente novamente mais tarde!","inline-block","alert-danger");
                }else{
                    var have_row = 0;
                    var type_row = "init";
                    var col_class = "col-lg-4";
                    if(view_width < 992){
                        col_class = "col-md-6";
                    }
                    for (var i = 0; i < result.length; i++) {
                        if(have_row == 0){
                            type_row = "init";
                        }
                        if(have_row == 1 && view_width >= 992){
                            type_row = "none";
                        }
                        if(have_row == 1 && view_width < 992){
                            type_row = "close";
                            have_row = -1;
                        }
                        if(have_row == 2 && view_width >= 992){
                            have_row = -1;
                            type_row = "close";
                        }
                        have_row = have_row +1;
                        element_innerHTML += createProfessionalCard(result[i],type_row,col_class);
                    }
                    professional_list_div.innerHTML = element_innerHTML;
                    if(professional_list_div.firstChild){
                        if(col_class == "col-lg-4"){
                            professional_list_div.firstChild.style.marginTop = "0px";
                        }else{
                            professional_list_div.firstChild.style.marginTop = "10%";
                        }
                    }
                }
            }).fail(function(result){
                alertChanged("Opps! Algo de errado esta acontecendo com o servidor, tente novamente mais tarde!","inline-block","alert-danger");
            });
        }

        function createProfessionalCard(element,type_row,col_class){
            var image = "";
            var name = "";
            var document_text = "";
            var profissional_id = "";
            if(element.sexo){
                if(element.sexo == "Feminino"){
                    image = female_avatar;
                }else{
                    image = male_avatar;
                }
            }
            if(element.foto){
                image = element.foto;
            }
            if(element.nome){
                name = element.nome;
            }
            if(element.conselho){
                document_text += element.conselho;
                document_text += " ";
            }
            if(element.uf_conselho){
                document_text += element.uf_conselho;
                document_text += " ";
            }
            if(element.documento_conselho){
                document_text += element.documento_conselho;
            }
            if(element.profissional_id){
                profissional_id = element.profissional_id;
            }
            var result = "";
            if(type_row == "init"){
                if(col_class == "col-lg-4"){
                    result += '<div class="row" style="margin-top: 10%;">';
                }else{
                    result += '<div class="row" style="margin-top: 20%;">';
                }
            }
            
            result += '<div class="'+col_class+'"><div class="card" style="width: 18rem;height: 50px;border-radius: 15px;"><div class="card-body" style=";background: white;border-radius: 15px;"><div class="row"><div class="col-lg-3"><img class="rounded-circle" src="'+image+'" style="width: 50px"></div><div class="col-lg-9"><h5 class="card-title">'+name+'</h5><p class="card-text">'+document_text+'</p></div></div><div class="row"><div class="col-lg-3"></div><div class="col-lg-3" style="margin-top: 10px;"><button type="button" data-toggle="modal" onclick="selectedProfessionalId(\''+profissional_id+'\')" data-target="#requestConsultModal" class="btn" style="background: #4dc64d;color: white">Agendar</button></div></div></div></div></div>'; 
            if(type_row == "close"){
                result += '</div>';
            }
            return result;
        }

        function selectedProfessionalId(profissional_id){
            selected_profissional_id = profissional_id
        }

        function requestConsult(){
            var data = {};
            var name = document.getElementById("name");
            var source_id = document.getElementById("source_id");
            var birth_date = document.getElementById("birth_date");
            var cpf = document.getElementById("cpf");
            var invalid_name = document.getElementById("invalid_name");
            var invalid_source_id = document.getElementById("invalid_source_id");
            var invalid_birth_date = document.getElementById("invalid_birth_date");
            var invalid_cpf = document.getElementById("invalid_cpf");
            var valid_form = true;

            name.classList.remove("is-invalid");
            source_id.classList.remove("is-invalid");
            birth_date.classList.remove("is-invalid");
            cpf.classList.remove("is-invalid");

            invalid_name.style.display = "none";
            invalid_source_id.style.display = "none";
            invalid_birth_date.style.display = "none";
            invalid_cpf.style.display = "none";

            if(name.value == ""){
                valid_form = false;
                invalid_name.style.display = "inline-block";
                name.classList.add("is-invalid");
            }

            if(source_id.value == ""){
                valid_form = false;
                invalid_source_id.style.display = "inline-block";
                source_id.classList.add("is-invalid");
            }

            if(birth_date.value == ""){
                valid_form = false;
                invalid_birth_date.style.display = "inline-block";
                birth_date.classList.add("is-invalid");
            }

            var cpf_valid = CPFValidate(cpf.value.replace(/[^0-9]/g, '').toString());
            if(cpf.value == "" || !cpf_valid){
                valid_form = false;
                invalid_cpf.style.display = "inline-block";
                cpf.classList.add("is-invalid");
            }

            if(valid_form){
                data.specialty_id = document.getElementById("especialidade_select").value;
                data.name = name.value;
                data.source_id = source_id.value;
                data.birth_date = birth_date.value;
                data.cpf = cpf.value;
                data.profissional_id = selected_profissional_id;

                $.ajax({
                  url: '{{ route("schedule.save") }}',
                  data: data,
                  method: 'POST'
                }).then(function(result){
                    if(result == "failed"){
                        alertChanged("Opps! Algo de errado esta acontecendo com o servidor, tente novamente mais tarde!","inline-block","alert-danger");
                    }
                    if(result == "success"){
                        alertChanged("Parabéns, você solicitou horários com sucesso!","inline-block","alert-success");
                    }
                    $('#requestConsultModal').modal('hide');
                }).fail(function(result){
                    alertChanged("Opps! Algo de errado esta acontecendo com o servidor, tente novamente mais tarde!","inline-block","alert-danger");
                });
            }
        }

        function CPFValidate(cpf){
            //get input
            
            if( cpf.length == 11 ){
                var v = [];

                //Calcula o primeiro dígito de verificação.
                v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
                v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
                v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
                v[0] = v[0] % 11;
                v[0] = v[0] % 10;

                //Calcula o segundo dígito de verificação.
                v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
                v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
                v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
                v[1] = v[1] % 11;
                v[1] = v[1] % 10;

                //Retorna Verdadeiro se os dígitos de verificação são os esperados.
                if ( (v[0] != cpf[9]) || (v[1] != cpf[10]) )
                {
                    return false;
                }
                return true;
            }else{
                return false;
            }
        }
    </script>
</body>
</html>