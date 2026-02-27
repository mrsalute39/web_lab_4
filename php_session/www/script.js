document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('Quiz');
	
	let resultDiv = document.getElementById('result');
    if (!resultDiv) {
        resultDiv = document.createElement('div');
        resultDiv.id = 'result';
        resultDiv.style.cssText = `
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        `;
        form.parentNode.insertBefore(resultDiv, form.nextSibling);
    }
    
    
    form.addEventListener('submit', function(event) {
        
        event.preventDefault();
        
        
        

        const usernameInput = form.querySelector('input[name="username"]');
        const username = usernameInput.value;
        
        
        const userageInput = form.querySelector('input[name="userage"]');
        const userage = userageInput.value;
        
        
        const themeSelect = form.querySelector('select[name="theme"]');
        const theme = themeSelect.value;
        
        
        const prizeCheckbox = form.querySelector('input[name="prize_bool"]');
        const prize_bool = prizeCheckbox.checked ? 'Да' : 'Нет';
        
        
        const difficultyRadios = form.querySelectorAll('input[name="difficulty"]');
        let difficulty = '';
        
        
        for (const radio of difficultyRadios) {
            if (radio.checked) {
                
                switch(radio.value) {
                    case '0':
                        difficulty = 'Легко';
                        break;
                    case '1':
                        difficulty = 'Норм';
                        break;
                    case '2':
                        difficulty = 'Прикладной математик';
                        break;
                    default:
                        difficulty = radio.value;
                }
                break;
            }
        }
        
        
        if (!difficulty) {
            difficulty = 'Не выбрано';
        }
        
        
        let themeText = '';
        switch(theme) {
            case 'games':
                themeText = 'Игры за 100';
                break;
            case 'books':
                themeText = 'Книги за 200';
                break;
            case 'humour':
                themeText = 'Шутки за 300';
                break;
            default:
                themeText = theme;
        }
        
        
        const message = `
ДАННЫЕ ИЗ ФОРМЫ:
================
Имя: ${username || 'Не указано'}
Возраст: ${userage || 'Не указан'}
Тема: ${themeText}
Приз: ${prize_bool}
Сложность: ${difficulty}
================
Спасибо за участие!
        `;
       
        alert(message);
		
		
    });
});