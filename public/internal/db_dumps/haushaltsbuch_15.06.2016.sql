ALTER TABLE haushaltsbuch.money_entries ADD payed BIT DEFAULT 0 NULL;

ALTER TABLE haushaltsbuch.money_entries MODIFY payed VARCHAR(1) DEFAULT b'0';