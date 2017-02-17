-- Question 1
select a.city
from agents a inner join orders o on o.aid = a.aid
		      inner join customers c on c.cid = o.cid
where c.cid = 'c006'
;

-- Question 2
select DISTINCT p.pid 
from products p inner join orders o on o.pid = p.pid
				inner join agents a on o.aid = a.aid
                inner join customers c on o.cid = c.cid
where c.city = 'Kyoto'
order by p.pid DESC;

-- Question 3
select name
from Customers
where cid not in (select cid
                  from Orders
                  where cid = cid)
;

-- Question 4
select c.name
from customers c full outer join orders o on o.cid = c.cid
where o.cid is NULL;

-- Question 5
select DISTINCT c. name, a.name
from customers c inner join orders o on o.cid = c.cid
				 inner join agents a on o.aid = a.aid
where c.city = a.city;

-- Question 6
select DISTINCT c. name, c.city, a.name, a.city
from customers c inner join agents a on a.city = c.city
where c.city = a.city;

-- Question 7
select c.name, c.city -- , count(p.city) Used to get count on products table
from customers c inner join products p on p.city = c.city
where c.city in (select c.city
                 from customers c inner join products p on p.city = c.city
			     group by p.city, c.name, c.city
				 limit (1)
                 )
group by p.city, c.name, c.city;