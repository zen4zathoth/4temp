function fMasc(objeto,mascara) {
    obj=objeto
    masc=mascara
    setTimeout("fMascEx()",1)
}
function fMascEx() {
    obj.value=masc(obj.value)
}

function mTel(telefone) {
    telefone=telefone.replace(/\D/g,"")
    telefone=telefone.replace(/^(\d)/,"($1")
    telefone=telefone.replace(/(.{3})(\d)/,"$1)$2")
    if(telefone.length == 9) {
        telefone=telefone.replace(/(.{1})$/,"-$1")
    } else if (telefone.length == 10) {
        telefone=telefone.replace(/(.{2})$/,"-$1")
    } else if (telefone.length == 11) {
        telefone=telefone.replace(/(.{3})$/,"-$1")
    } else if (telefone.length == 12) {
        telefone=telefone.replace(/(.{4})$/,"-$1")
    } else if (telefone.length > 12) {
        telefone=telefone.replace(/(.{4})$/,"-$1")
    }
    return telefone;
}


function mCPF(cpf){
    cpf=cpf.replace(/\D/g,"")
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
    cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return cpf
}

