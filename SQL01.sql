SELECT
    m.NamaMahasiswa,
    mk.NamaMatakuliah,
    n.Grade
FROM
    tMahasiswa m
JOIN
    tNilai n ON m.NIRM = n.NIRM
JOIN
    tMatakuliah mk ON n.KodeMK = mk.KodeMK
WHERE
    (YEAR(CURRENT_DATE()) - YEAR(m.TglLahir) > 25 OR (YEAR(CURRENT_DATE()) - YEAR(m.TglLahir) = 25 AND MONTH(CURRENT_DATE()) >= MONTH(m.TglLahir) AND DAY(CURRENT_DATE()) >= DAY(m.TglLahir)))
    AND n.Grade < 60;