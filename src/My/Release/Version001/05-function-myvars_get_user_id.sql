CREATE OR REPLACE FUNCTION public.myvars_get_user_id()
RETURNS UUID AS
$body$
DECLARE
  user_id UUID;
  tmp TEXT;
BEGIN
  user_id = NULL;
  tmp = myvars_get('user_id');
  IF (tmp IS NOT NULL) THEN
    user_id = tmp :: UUID;
  END IF;
  RETURN user_id;
EXCEPTION
WHEN others THEN
  user_id = NULL;
  RETURN user_id;
END;
$body$
LANGUAGE 'plpgsql'
VOLATILE
CALLED ON NULL INPUT
SECURITY INVOKER
COST 100;