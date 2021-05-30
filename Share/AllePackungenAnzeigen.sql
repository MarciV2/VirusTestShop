SELECT 
        p.Packung_ID, 
        p.Artikel_ID,
        h.Name AS Hersteller, 
        a.Artikelname AS Artikelname, 
        a.Beschreibung AS Beschreibung, 
        p.Packungsgroessee AS Packungsgroesse, 
        round(p.Verkaufspreis,2) AS Preis, 
        p.Lagermenge AS Bestand,
        k.Bezeichnung AS Kategorie  

        FROM 
        packung p 
        JOIN artikel a ON a.Artikel_ID=p.Artikel_ID 
        LEFT JOIN hersteller h ON h.Hersteller_ID=a.Hersteller_ID 
        LEFT JOIN kategorie k ON k.kategorie_ID=a.kategorie_ID