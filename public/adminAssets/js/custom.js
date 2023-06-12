var singleRadioButton = document.getElementById('single');
var departmentWiseRadioButton = document.getElementById('department_wise');
var singlePayrollDiv = document.getElementById('single_payroll');
var departmentWisePayrollDiv = document.getElementById('department_wise_payroll');

function handleRadioButtonChange() {
    if (singleRadioButton.checked) {
        singlePayrollDiv.style.display = 'block';
        departmentWisePayrollDiv.style.display = 'none';
    } else if (departmentWiseRadioButton.checked) {
        singlePayrollDiv.style.display = 'none';
        departmentWisePayrollDiv.style.display = 'block';
    }
}

singleRadioButton.addEventListener('change', handleRadioButtonChange);
departmentWiseRadioButton.addEventListener('change', handleRadioButtonChange);
