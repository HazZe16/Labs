-- Alfred, 1/31/2017, Database Management Lab3
-- Q1
Select ordNumber, totalUSD
From Orders;

-- Q2
Select name, city
From Agents
Where name = 'Smith';

-- Q3
Select pid, name, priceUSD
From Products
Where quantity > 200000;

-- Q4
Select name, city
From Customers
Where city = 'Duluth';

-- Q5
Select name
From Agents
Where city != 'New York' and 
city != 'Duluth';

-- Q6
Select *
From Products
Where city != 'New York' 
and city != 'Duluth'
and priceUSD >= 1;

-- Q7
Select *
From Orders
Where month = 'Feb'
or month = 'May';

-- Q8
Select *
From Orders
Where month = 'Feb'
and totalUSD >= 600;

-- Q9
Select *
From Orders
Where cid = 'c005';