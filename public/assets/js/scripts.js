$(document).ready(function () {
    $("#btnSend").click(function(){
        var action = $("#action").val();
                        
        if(validateForm()) {
            $.ajax({
                type: "POST",
                url: action,
                dataType: 'json',
                data: $("#form-register").serialize(),
                success: function (ret)
                {
                    if(ret.id > 0) {
                        var msg = "";
                        if(action == "/save") {
                            msg = "cadastrado";
                            $("input[type=text]").val("");
                        } else {
                            msg = "atualizado";                            
                        }
                        swal(
                            'Sucesso!',
                            'Candidato '+ msg +' com sucesso!',
                            'success'
                        );
                    } else {
                        swal(
                            'Ops!',
                            ret.msg,
                            'error'
                        );                                
                    }
                },
                error: function (r) {
                    swal(
                        'Ops!',
                        'Falha no servidor. Entre em contato com o suporte!',
                        'error'
                    );
                }
            });
        }
            
        return false;
    });
    
});

function validateForm() {
    $("form input[required]").each(function(){
        if($(this).val() == "") {
            $(this).addClass("error");
        } else {
            $(this).removeClass("error");
        }
    });
    
    if($("input.error").length > 0) {
        return false;       
    } else {
        return true;       
    }
}

function deleteCandidate(id) {
    if(confirm("Você tem certeza que deseja excluir este candidato?")){
        $.ajax({
            type: "POST",
            url: '/delete',
            dataType: 'json',
            data: {id: id},
            success: function (ret)
            {
                swal(
                    'Sucesso!',
                    'Candidato excluído com sucesso!',
                    'success'
                );
                
                setInterval(function () {
                    window.location.reload();
                }, 1500);
            },
            error: function (r) {
                swal(
                    'Ops!',
                    'Falha no servidor. Entre em contato com o suporte!',
                    'error'
                );
            }
        });
    }

    return false;
}