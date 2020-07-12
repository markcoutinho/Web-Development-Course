function calculator(operation) {
    operand1 = Number(document.getElementById('operand1').value);
    operand2 = Number(document.getElementById('operand2').value);
    if(operand1=='' || operand2==''){
        alert("Please Enter both the operands");
    }    
    else if( isNaN(operand1) || isNaN(operand2) ) {
        alert("Please Enter numerical input")
    }
    else {
        let result = 0
        if(operation == 'add') {
            result = operand1 + operand2;            
        }
        else if(operation == 'subtract') {
            result = operand1 - operand2;            
        }
        else if(operation == 'multiply') {
            result = operand1 * operand2;            
        }
        else if(operation == 'divided') {
            result = operand1 / operand2;            
        }
        document.getElementById('result').value = result;
    }
}



function validateEmail(){
    const email = document.getElementById('exampleInputEmail1')
    const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.value.match(mailformat)){
        email.classList.remove('red')
        email.classList.add('green')
        console.log('Yess')
    }
    else {
        email.classList.remove('green')
        email.classList.add('red')
        console.log('no')
    }
}










