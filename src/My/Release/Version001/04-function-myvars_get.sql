CREATE OR REPLACE FUNCTION public.myvars_get (
  varname varchar(100)
)
RETURNS TEXT AS
$body$
DECLARE
  setting text;
BEGIN
  setting = current_setting('myvars.' || varname);
  RETURN setting;
EXCEPTION
WHEN others THEN
  setting = NULL;
  RETURN setting;
END;
$body$
LANGUAGE 'plpgsql'
VOLATILE
CALLED ON NULL INPUT
SECURITY INVOKER
COST 100;
