
            // Turn off automatic editor creation first.
            
            CKEDITOR.disableAutoInline = true;
            CKEDITOR.inline( 'titreedit' );
            CKEDITOR.instances.titreedit.updateElement();
            CKEDITOR.inline( 'descredit' );
            CKEDITOR.instances.descredit.updateElement();
            CKEDITOR.inline( 'galleryedit' );
            CKEDITOR.instances.galleryedit.updateElement();
