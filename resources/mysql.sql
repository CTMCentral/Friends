-- #! mysql
    -- #{ friends
        -- #{ init
                CREATE TABLE IF NOT EXISTS friends(username TEXT NOT NULL, friendlist TEXT, enabled BOOL);
        -- #}
        -- #{ player
            -- #{ init
                REPLACE INTO friends(username, enabled) VALUES (:username, :enabled);
            -- #}
        -- #}
    -- #}