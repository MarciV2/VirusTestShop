SELECT
a.Artikel_ID,
h.Name AS Hersteller,
a.Artikelname AS Artikelname,
a.Beschreibung AS Beschreibung,
p.Packungsgroessee AS Packungsgröße, 
p.Verkaufspreis AS Preis

FROM 
packung p
JOIN artikel a ON a.Artikel_ID=p.Packung_ID
LEFT JOIN hersteller h ON h.Hersteller_ID=a.Hersteller_ID




