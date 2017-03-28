CREATE TABLE public.zip
(
    zip integer NOT NULL,
    city text,
    state text,
    PRIMARY KEY (zip)
);

CREATE TABLE public.people
(
    pid character(4) NOT NULL,
    name text,
    address text,
    zip integer references zip(zip),
    PRIMARY KEY (pid)
);

CREATE TABLE spouse
(
    pid character(4) NOT NULL references people(pid),
    partner text,
    PRIMARY KEY (pid)
);

CREATE TABLE actor
(
    pid character(4) NOT NULL references people(pid),
    haircolor text,
    eyecolor text,
    favoritecolor text,
    height integer,
    weight integer,
    birthday date,
    actoranniversary date,
    PRIMARY KEY (pid)
);

CREATE TABLE director
(
    pid character(4) NOT NULL references people(pid),
    filmschool text,
    favoritelensmaker text,
    directoranniversary date,
    PRIMARY KEY (pid)
);

CREATE TABLE movie
(
    mid character(4) NOT NULL,
    name text,
    year integer,
    mpaa integer,
    totalsales integer,
    domesticsales integer,
    foreignsales integer,
    dvdsales integer,
    PRIMARY KEY (mid)
);

CREATE TABLE roles
(
    pid character(4) NOT NULL references people(pid),
    mid character(4) NOT NULL references movie(mid),
    roles text,
    PRIMARY KEY (mid, pid)
);

