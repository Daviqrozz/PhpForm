const passwordInput = document.querySelector('#passwordFieldInput')


passwordInput.addEventListener('focus', () => {
    document.querySelector('.passwordRules').style.display = 'block'
})
passwordInput.addEventListener('blur', () => {
    document.querySelector('.passwordRules').style.display = 'none'
})

passwordInput.addEventListener('input', () => {
    const passwordValue = passwordInput.value
    const passwordLength = passwordValue.length

    if (passwordLength >= 8) {
        document.querySelector('.passwordRule').style.color = 'green'
    } else if (passwordLength <= 0) {
        document.querySelector('.passwordRule').style.color = 'red'
    } else {
        document.querySelector('.passwordRule').style.color = 'yellow'
    }

    const regex = passwordValue.match(/[@#&\/.!-+{},]/)

    if (regex) {
        document.querySelector('.passwordRule2').style.color = 'green'
    } else {
        document.querySelector('.passwordRule2').style.color = 'red'
    }

    if (regex && passwordLength >= 8) {
        document.querySelector('.registerButton').style.backgroundColor = 'green'
    }else{
        document.querySelector('.registerButton').style.backgroundColor = 'red'
    }
})