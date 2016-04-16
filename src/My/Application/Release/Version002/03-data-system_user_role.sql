SET search_path = public, pg_catalog;


-- Data for table public.tbl_system_user_role
INSERT INTO tbl_system_user_role
    (id, code, name)
VALUES
    (1, 'viewer',         'Viewer'),
    (2, 'editor',         'Editor'),
    (3, 'sales-mgr',      'Sales Manager'),
    (4, 'purchasing-mgr', 'Purchasing Manager'),
    (5, 'general-mgr',    'General Manager'),
    (9, 'admin',          'System Administrator')
;
