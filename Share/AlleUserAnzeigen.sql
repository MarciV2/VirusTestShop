SELECT k.Kunde_ID,
k.LoginName,
k.Vorname,
k.Name,
k.Email,
k.Telefon,
kt.Bezeichung,
a.Land,
a.Bundesland,
a.Stadt,
a.Stadtteil,
a.PLZ,
a.Strasse,
a.Hausnummer

FROM Kunde k
JOIN Adresse a ON k.Adresse_ID=a.Adresse_ID
JOIN Kundentyp kt ON k.Kundentyp_ID=kt.Kundentyp_ID
