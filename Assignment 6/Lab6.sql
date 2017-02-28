-- Question 1
select c.name, c.city
from customers c inner join products p on c.city = p.city
where c.city in ( select c.city
                 from customers c inner join products p on c.city = p.city
                 group by p.city, c.name, c.city
                 having Count(p.city) = Count(p.city) -- to get the max city
                 order by c.city ASC -- to get the highest one first
                 limit 1 -- to limit the results to not get the lower ones 
                 )
group by p.city, c.name, c.city;
     
-- Question 2
select p.name,p.priceUSD
from products p
where p.priceUSD > (select avg(priceUSD)
                    from products
                    )
order by name DESC
;

-- Question 3
select c.name, o.pid, sum(o.totalUSD)
from customers c inner join orders o on c.cid = o.cid
group by c.name, o.pid
order by sum(o.totalUSD) ASC;


-- Question 4 
select c.name, coalesce(sum(o.totalUSD), 0)
from customers c left outer join orders o on c.cid = o.cid
group by c.name
order by c.name ASC;

-- Question 5
select c.name, p.name, a.name
from customers c inner join orders o on c.cid = o.cid
				 inner join products p on p.pid = o.pid
                 inner join agents a on a.aid = o.aid
where a.city = 'Newark'
;

-- Question 6
Select ordNumber, month, cid, aid, pid, qty, totalUSD -- *
From (Select o.ordNumber, o.month, o.cid, o.aid, o.pid, o.qty, o.totalUSD,
      o.qty*p.priceusd*(1-(c.discount/100)) as realprice 
      from orders o inner join products p on p.pid = o.pid
      				inner join customers c on c.cid = o.cid
      ) as RealPriceTable
where totalUSD != realprice
;