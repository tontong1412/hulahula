--------------------------------------------------------
--  DDL for Trigger BI_WORKTIME
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "HULAHULA"."BI_WORKTIME" 
  before insert on "WORKTIME"               
  for each row  
begin   
  if :NEW."ID" is null then 
    select "WORKTIME_SEQ".nextval into :NEW."ID" from dual; 
  end if; 
end; 

/
ALTER TRIGGER "HULAHULA"."BI_WORKTIME" ENABLE;
