SELECT
h.Name AS Hersteller,
a.Artikelname AS Artikelname,
p.Packungsgroessee AS Packungsgröße, 
p.Verkaufspreis AS Preis

FROM 
packung p, 
artikel a, 
hersteller h
WHERE
p.Artikel_ID=a.Artikel_ID AND
h.Hersteller_ID=a.Hersteller_ID
