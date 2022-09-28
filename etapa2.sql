SELECT
    departaments.dpt_name AS departament_name,
    CONCAT(employees.first_nam, ' ', employees.last_nam) AS employers_name,
    DATEDIFF(day, dpt_emp.from_date, dpt_emp.to_date) AS worked_days
  FROM employees
	LEFT JOIN dpt_emp ON dpt_emp.emp_no = employees.emp_no
	LEFT JOIN departaments ON departaments.dpt_no = dpt_emp.dpt_no
