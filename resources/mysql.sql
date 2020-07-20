-- #! mysql
    -- #{ friends
        -- #{ init
                CREATE TABLE IF NOT EXISTS friends(username TEXT NOT NULL, friendlist TEXT);
        -- #}
    -- #}