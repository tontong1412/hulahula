--------------------------------------------------------
--  Ref Constraints for Table LOGIN
--------------------------------------------------------

  ALTER TABLE "HULAHULA"."LOGIN" ADD CONSTRAINT "REF" FOREIGN KEY ("EMPLOYEE_ID")
	  REFERENCES "HULAHULA"."EMPLOYEE" ("ID") ON DELETE CASCADE ENABLE;
