SET search_path = public, pg_catalog;


-- Data for table public.tbl_system_entity_status
INSERT INTO tbl_system_entity_status
    (id, code, name, short_description, next_status_ids, entity_type_id, action_label)
VALUES
    -- TOKENS
    (11, 'active', 'Active', 'Active token', '[12]'::jsonb, 1, 'Activate'),
    (12, 'deleted', 'Suspended', 'Suspended token', '[]'::jsonb, 1, 'Delete'),

    -- USERS
    (20, 'incomplete', 'Incomplete', 'Incomplete user', '[21]'::jsonb, 2, ''),
    (21, 'active', 'Active', 'Active user', '[22,23]'::jsonb, 2, 'Activate'),
    (22, 'suspended', 'Suspended', 'Suspended user', '[21,23]'::jsonb, 2, 'Suspend'),
    (23, 'deleted', 'Deleted', 'Deleted user', '[21,22]'::jsonb, 2, 'Delete'),

    -- COMPANIES
    (30, 'incomplete', 'Incomplete', 'Incomplete company', '[31]'::jsonb, 3, ''),
    (31, 'active', 'Active', 'Active company', '[32,33]'::jsonb, 3, 'Activate'),
    (32, 'suspended', 'Suspended', 'Suspended company', '[31,33]'::jsonb, 3, 'Suspend'),
    (33, 'deleted', 'Closed', 'Closed company account', '[31]'::jsonb, 3, 'Delete'),

    -- ADDRESSES
    (41, 'active', 'Active', 'Active address', '[42]'::jsonb, 4, 'Activate'),
    (42, 'deleted', 'Old address', 'Old address', '[41]'::jsonb, 4, 'Delete'),

    -- PHONE NUMBERS
    (51, 'active', 'Active', 'Active phone number', '[52]'::jsonb, 5, 'Activate'),
    (52, 'deleted', 'Old phone number', 'Old phone number', '[51]'::jsonb, 5, 'Delete'),
    
    -- CATEGORIES
    (61, 'active', 'Active', 'Active category', '[62]'::jsonb, 6, 'Activate'),
    (62, 'deleted', 'Deleted', 'Deleted category', '[61]'::jsonb, 6, 'Delete'),

    -- ITEMS
    (71, 'active', 'Available', 'Available item', '[72,73]'::jsonb, 7, 'Activate'),
    (72, 'suspended', 'Unavailable', 'Unavailable item', '[71,73]'::jsonb, 7, 'Suspend'),
    (73, 'deleted', 'Discontinued', 'Discontinued item', '[71]'::jsonb, 7, 'Delete'),

    -- ITEM PRICES
    (711, 'active', 'Active', 'Active item price', '[]'::jsonb, 71, 'Activate'),
    -- ITEM COSTS
    (721, 'active', 'Active', 'Active item cost', '[]'::jsonb, 72, 'Activate'),

    -- CUSTOMER ORDERS
    (9100, 'draft', 'Draft', 'Draft order', '[9101]'::jsonb, 9, 'Draft'),
    (9101, 'open', 'Open', 'Open order', '[9100,9102,9103,9104]'::jsonb, 9, 'Submit'),
    (9102, 'confirmed', 'Confirmed', 'Order confirmed by seller', '[9103,9104,9105]'::jsonb, 9, 'Confirm'),
    (9103, 'rejected', 'Rejected', 'Order rejected by seller', '[]'::jsonb, 9, 'Reject'),
    (9104, 'cancelled', 'Cancelled', 'Order cancelled by customer', '[]'::jsonb, 9, 'Cancel'),
    (9105, 'packing', 'Packing', 'Packing items', '[9106]'::jsonb, 9, 'Pack'),
    (9106, 'delivering', 'Delivering', 'Order being delivered', '[9107]'::jsonb, 9, 'Deliver'),
    (9107, 'paid', 'Paid', 'Payment taken', '[9108]'::jsonb, 9, 'Take payment'),
    (9108, 'complete', 'Completed', 'Ordered completed', '[]'::jsonb, 9, 'Complete'),
    
    -- RETAILER ORDERS
    (9200, 'draft', 'Draft', 'Draft order', '[9201,9202]'::jsonb, 9, 'Draft'),
    (9201, 'requested-quote', 'Awaiting Quote', 'Awaiting quote', '[9200,9202,9203]'::jsonb, 9, 'Request Quote'),
    (9202, 'cancelled', 'Cancelled', 'Order cancelled', '[]'::jsonb, 9, 'Cancel'),
    (9203, 'pricing', 'Pricing', 'Entering prices', '[9204]'::jsonb, 9, 'Prepare/Revise Quote'),
    (9204, 'priced', 'Priced', 'Quote ready, awaiting manager''s approval', '[9205]'::jsonb, 9, 'Quote Ready'),
    (9205, 'quoted', 'Quoted', 'Quote sent to customer', '[9206,9207]'::jsonb, 9, 'Send Quote'),
    (9206, 'confirmed', 'Confirmed', 'Quote confirmed by customer', '[9208]'::jsonb, 9, 'Confirm'),
    (9207, 'rejected', 'Rejected', 'Quote rejected by customer', '[]'::jsonb, 9, 'Reject'),
    (9208, 'packing', 'Packing', 'Packing items', '[9209]'::jsonb, 9, 'Pack'),
    (9209, 'delivering', 'Delivering', 'Order being delivered', '[]'::jsonb, 9, 'Deliver'),
    (9210, 'paid', 'Paid', 'Payment taken', '[9211]'::jsonb, 9, 'Payment'),
    (9211, 'complete', 'Completed', 'Ordered completed', '[]'::jsonb, 9, 'Complete'),
    
    -- WHOLESALER ORDERS
    (9300, 'draft', 'Draft', 'Draft order', '[9301]'::jsonb, 9, 'Revise'),
    (9301, 'requested-quote', 'Awaiting Quote', 'Awaiting quote', '[9300,9302,9303]'::jsonb, 9, 'Request Quote'),
    (9302, 'cancelled', 'Cancelled', 'Order cancelled', '[]'::jsonb, 9, 'Cancel'),
    (9303, 'pricing', 'Pricing', 'Entering prices', '[9304]'::jsonb, 9, 'Prepare/Revise Quote'),
    (9304, 'priced', 'Priced', 'Quote ready, awaiting manager''s approval', '[9305]'::jsonb, 9, 'Quote Ready'),
    (9305, 'quoted', 'Quoted', 'Quote received', '[9306,9307]'::jsonb, 9, 'Receive Quote'),
    (9306, 'confirmed', 'Confirmed', 'Quote confirmed', '[9308]'::jsonb, 9, 'Confirm'),
    (9307, 'rejected', 'Rejected', 'Quote rejected', '[]'::jsonb, 9, 'Reject'),
    (9308, 'packing', 'Packing', 'Packing items', '[9309]'::jsonb, 9, 'Pack'),
    (9309, 'delivering', 'Delivering', 'Order being delivered', '[]'::jsonb, 9, 'Deliver'),
    (9310, 'paid', 'Paid', 'Payment made', '[9311]'::jsonb, 9, 'Payment'),
    (9311, 'complete', 'Completed', 'Ordered completed', '[]'::jsonb, 9, 'Complete'),

    -- ORDER ITEMS
    (101, 'active', 'Active', 'Active order item', '[102,103]'::jsonb, 10, 'Activate'),
    (102, 'cancelled', 'Cancelled', 'Cancelled order item', '[101]'::jsonb, 10, 'Cancel'),
    (103, 'deleted', 'Deleted', 'Deleted order item', '[101]'::jsonb, 10, 'Delete'),

    -- ASSETS
    (111, 'active', 'Active', 'Active asset', '[112]'::jsonb, 11, 'Undelete'),
    (112, 'deleted', 'Deleted', 'Deleted asset', '[111]'::jsonb, 11, 'Delete'),

    -- PAGES
    (121, 'draft', 'Draft', 'Draft page', '[]'::jsonb, 12, 'Unpublish'),
    (122, 'published', 'Published', 'Published page', '[]'::jsonb, 12, 'Publish'),
    (123, 'deleted', 'Deleted', 'Deleted page', '[]'::jsonb, 12, 'Delete')
;