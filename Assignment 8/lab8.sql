-- Lab 8
select *
from people p inner join director d on d.pid = p.pid
			  inner join roles r on r.pid = p.pid
where d.pid = r.pid and r.pid = 'p001'
;