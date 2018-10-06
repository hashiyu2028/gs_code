-- phpMyadmin https://techacademy.jp/magazine/12273

INSERT INTO gs_an_table
(name, email, naiyou, indate)
VALUES
('仲清花', 'test2@test.jp','メモ',sysdate());

INSERT INTO gs_an_table (name, email, naiyou, indate) VALUES ('仲清花', 'test2@test.jp','メモ',sysdate())


--SELECT でデータを取り出す

SELECT * FROM gs_an_table --全て取得
SELECT name, email FROM gs_an_table --複数選択

SELECT * FROM gs_an_table WHERE name='仲清花' --nameの条件
SELECT * FROM gs_an_table WHERE id>=1 AND id<=3 -- 1-3の範囲

SELECT * FROM gs_an_table WHERE name LIKE '%ホステル%' --ホステルを除きたい

SELECT * FROM gs_an_table ORDER BY indate DESC -- ORDER BY=並び替え DESC=降順 ASC=昇順
SELECT * FROM gs_an_table ORDER BY indate DESC DESC LIMIT 3 --3つまで表示