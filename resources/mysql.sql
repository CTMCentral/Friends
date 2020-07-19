-- #! mysql
-- #{ CTMCentral
    -- #{ friends
        --# {  init

            CREATE TABLE IF NOT EXISTS friends(
                username TEXT PRIMARY KEY NOT NULL,
                friends TGXT
            )
        -- #}
    -- #}
-- #}