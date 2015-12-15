--------------------------------------------------------
--  Ref Constraints for Table WORKS_ON
--------------------------------------------------------

  ALTER TABLE "HULAHULA"."WORKS_ON" ADD CONSTRAINT "EMPID" FOREIGN KEY ("EID")
	  REFERENCES "HULAHULA"."EMPLOYEE" ("ID") ENABLE;
  ALTER TABLE "HULAHULA"."WORKS_ON" ADD CONSTRAINT "WORK" FOREIGN KEY ("WID")
	  REFERENCES "HULAHULA"."WORKTIME" ("ID") ENABLE;
