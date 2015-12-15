--------------------------------------------------------
--  Ref Constraints for Table REVIEW
--------------------------------------------------------

  ALTER TABLE "HULAHULA"."REVIEW" ADD CONSTRAINT "REVIEW" FOREIGN KEY ("BKNUM")
	  REFERENCES "HULAHULA"."RESERVATION" ("BOOKINGNUMBER") ON DELETE CASCADE ENABLE;
