select * from users;

select users.fname roles.role 
from users 
inner join users on roles.id = users.roleid; 

insert into users (fname, lname, email, mobile, password, roleid) 
values ('Stephan', 'Hoeksema', 's.hoeksema@windesheimflevoland.nl', '0641612525', 'ietsie!0*0', 1);

update users set fname = 'Stephan Paul' where id = 1

delete from user where id = ?;

insert into roles (role) 
values ('Admin');

update roles set role = 'Administrator' where id = 1;

delete from roles where id = ?;

insert into legoideas (name, description, `step01`, `pieces01`, `step02`, `pieces02`, `step03`, `pieces03`)
values ('Xtreme Police', 'This police man does not fear any obstical', 'sOsobiście uważam, że z Lego się nie wyrasta. Ewentualnie ja nie dorastam. Ale przyszedł moment, w którym z "budowania do szuflady" postanowiłem, zainspirowanymi kilkoma wspaniałymi blogami AFOLi, założyć coś własnego.', '5 rectancal 4, 4 double','budowania do szuflady postanowiłem, zainspirowanymi', '500x2dotsqure','sOsobiście uważam, że z Lego się nie wyrasta.', '5 triangle');

insert into posts (name, description) 
values ('great Xtreme Police', 'Lego wings in as grounds chicory galão redeye french press cortado sugar. Mug spoon ristretto foam aroma iced to go redeye extra kopi-luwak. Lungo latte decaffeinated, con panna caffeine half and half organic lungo. Steamed, wings seasonal fair trade rich that con panna organic.');

insert into `comments` (`postid`, `comment`)
values (1, 'Lego police coffeedoppio, seasonal con panna at a organic. Café au lait, as aromatic acerbic cream extra beans bar whipped so cultivar.');

select postid, name, comment, comments.id from posts
inner join `comments` on comments.`postid` = posts.`id`;