-- Lab 4
-- Question 1
select city
from agents
where aid in (select aid
             from orders
             where cid = 'c006'
             )
order by city ASC;

-- Question 2
select distinct pid
from products
where pid in(select pid
             from orders
             where cid in(select cid
                          from customers
                          where city in ('Kyoto')
                          )
             )
order by pid ASC;

-- Question 3
select cid, name
from customers
where cid not in (select cid
                  from orders
                  where aid in ('a01')
                  );
                  
-- Question 4
select cid
from customers
where cid in (select cid
              from orders
              where pid in('p01', 'p07')
              )
;
              
-- Question 5
select pid
from products
where pid in (select pid
              from orders
              where aid  not in ('a08')
              )
order by pid DESC;

-- Question 6
select name, discount, city
from customers
where cid in (select cid
              from orders
              where aid in(select aid
                           from agents
                           where city in ('Tokyo', 'New York')
                           )
              )
;

-- Question 7
Select *
from customers
where discount =ANY (select discount
                   from customers
                   where city in ('Duluth', 'London')
                   )
;